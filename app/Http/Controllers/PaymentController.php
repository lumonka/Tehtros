<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusEnum;
use App\Models\Transaction;
use App\Service\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use YooKassa\Model\Notification\NotificationEventType;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function create(Request $request, PaymentService $service)
    {
        $amount = (float)$request->input('amount');
        $user = auth()->user();

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'amount' => $amount,
            'status' => 'CREATED',
        ]);

        $user->balance += $amount;
        $user->save();

        if ($transaction) {
            $link = $service->createPayment($amount, [
                'transaction_id' => $transaction->id
            ]);

            return redirect()->away($link);
        }
    }

    public function callback(Request $request, PaymentService $service)
    {
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);


        if (isset($requestBody['event']) && $requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED) {
            $notification = new NotificationSucceeded($requestBody);
        } elseif (isset($requestBody['event']) && $requestBody['event'] === NotificationEventType::PAYMENT_WAITING_FOR_CAPTURE) {
            $notification = new NotificationWaitingForCapture($requestBody);
        } else {
            // Если уведомление не содержит нужного события, просто завершаем обработку
            return;
        }

        if ($notification instanceof NotificationWaitingForCapture) {
            $payment = $notification->getObject();
            // Ваш код обработки
        } elseif ($notification instanceof NotificationSucceeded) {
            $payment = $notification->getObject();
            // Ваш код обработки
        }

        // Обновление статуса транзакции на CONFIRMED
        if ($payment && isset($payment->metadata->transaction_id)) {
            $transactionId = (int)$payment->metadata->transaction_id;
            $transaction = Transaction::find($transactionId);
            if ($transaction) {
                $transaction->status = PaymentStatusEnum::CONFIRMED;
                $transaction->save();
            }
        }

        if ($payment && isset($payment->status) && $payment->status === 'waiting_for_capture') {
            $service->getClient()->capturePayment([
               'amount' => $payment->amount
            ], $payment->id, uniqid('', true));
        }

        if ($payment && isset($payment->status) && $payment->status === 'succeeded') {
            if ((bool)$payment->paid === true) {
                $metadata = (object)$payment->metadata;
                if (isset($metadata->transaction_id)) {
                    $transactionId = (int)$metadata->transaction_id;
                    $transaction = Transaction::find($transactionId);
                    $transaction->status = PaymentStatusEnum::CONFIRMED;
                    $transaction->save();

                    if (cache()->has('amount')) {
                        cache()->forever('balance', cache()->get('balance') + (int)$payment->amount->value);
                    } else {
                        cache()->forever('balance', $payment->amount->value);
                    }
                }
            }
        }
    }
}
