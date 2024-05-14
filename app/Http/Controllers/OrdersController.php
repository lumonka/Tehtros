<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders');
    }

    public function createOrder(Request $request)
    {
        $orderTable = DB::table('orders');
        $userCartTable = DB::table('cart')->where('uid', $request->user()->id)->get();
        $user = Auth::user();

        // Вычислите общую стоимость товаров в корзине пользователя
        $totalPrice = 0;
        foreach ($userCartTable as $cartItem) {
            $product = DB::table('products')->where('id', $cartItem->pid)->first();
            $totalPrice += $product->product_price * $cartItem->qty;
        }

        // Проверьте, достаточно ли у пользователя средств для покупки всех товаров
        if ($user->balance >= $totalPrice) {
            // Уменьшите баланс пользователя на общую стоимость товаров
            $user->balance -= $totalPrice;
            $user->save();

            // Оформите покупку товаров (создайте запись в базе данных, отправьте уведомление и т. д.)
            $orderNumber = Str::random(8);
            $checkOrderNumber = $orderTable->where('number', $orderNumber)->get()->groupBy(['number', 'uid'])->all();
            $orderNumber = $checkOrderNumber > 0 ? Str::random(8) : $orderNumber;

            foreach ($userCartTable as $cartItem) {
                $orderTable->insert([
                    'uid' => $cartItem->uid,
                    'pid' => $cartItem->pid,
                    'qty' => $cartItem->qty,
                    'number' => $orderNumber
                ]);
            }

            // Очистите корзину пользователя после покупки
            DB::table('cart')->where('uid', $request->user()->id)->delete();

            // Верните ответ об успешной покупке
            return redirect()->route('profile.edit');
        } else {
            // Если у пользователя недостаточно средств, верните сообщение об ошибке
            return false;
        }
    }

    public function deleteOrder(Request $request)
    {
        $user = Auth::user();
        $order = DB::table('orders')->where('uid', $user->id)->where('number', $request->number)->first();

        if (!is_null($order) && $order->status == 'Новый') {
            // Получаем товары из заказа
            $orderItems = DB::table('orders')->where('number', $request->number)->get();

            // Добавляем стоимость каждого товара к балансу пользователя
            foreach ($orderItems as $item) {
                $product = DB::table('products')->where('id', $item->pid)->first();
                $user->balance += $product->product_price * $item->qty;
            }

            // Сохраняем обновленный баланс пользователя
            $user->save();

            // Удаляем запись о заказе из базы данных
            DB::table('orders')->where('number', $request->number)->delete();

            return redirect()->route('profile.edit')->with('success', 'Заказ успешно отменен, средства возвращены на ваш счет.');
        } else {
            return abort(404);
        }
    }
}
