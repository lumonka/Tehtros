<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function changeAvatarIndex()
    {
        return view('profile.change-avatar');
    }

    public function settings(Request $request)
    {
        return view('profile.settings',[
            'user' => $request->user()
            ]);
    }

    public function sendResetPasswordEmail(Request $request)
    {
        // Проверяем валидность введенного email
        $request->validate(['email' => 'required|email']);

        // Генерируем токен для сброса пароля и отправляем письмо
        $status = Password::sendResetLink(
            $request->only('email'),
            function (Message $message) {
                $message->subject(('Your Password Reset Link'));
                $message->view('vendor.mail.password_reset');
            }
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', ($status))
            : back()->withErrors(['email' => __($status)]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $id = $request->user()->id;
        $usersTable = DB::table('users')->where('id', $id)->get();

        $transactions = Transaction::where('user_id', $id)->orderBy('id', 'desc')->get();

        $goodOrders = [];
        $ordersTable = DB::table('orders')->where('uid', $request->user()->id)->get()->groupBy(['number']);

        foreach ($ordersTable as $order) {
            $openedOrder = $order->all();
            $date = $openedOrder[0]->created_at;
            $orderNumber = $openedOrder[0]->number;
            $orderStatus = $openedOrder[0]->status;
            $totalPrice = 0;
            $totalQty = 0;
            $products = [];


            foreach ($openedOrder as $orderItem) {
                $product = DB::table('products')->where('id', $orderItem->pid)->first();
                $totalPrice += $product->product_price * $orderItem->qty;
                $totalQty += $orderItem->qty;

                array_push(
                    $products,
                    (object)[
                        'name' => $product->product_name,
                        'price' => $product->product_price,
                        'qty' => $orderItem->qty,
                    ]
                );
            }


            array_push(
                $goodOrders,
                (object)[
                    'number' => $orderNumber,
                    'products' => $products,
                    'date' => $date,
                    'totalPrice' => $totalPrice,
                    'totalQty' => $totalQty,
                    'status' => $orderStatus,
                ]
            );
        }

        return view('profile.edit', [
            'user' => $request->user(),
            'usersTable' => $usersTable,
            'orders' => $goodOrders,
            'transactions' => $transactions
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image',
        ]);

        $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('avatars'), $avatarName);

        Auth()->user()->update(['avatar'=>$avatarName]);

        return back()->with('success', 'Avatar updated successfully.');
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.settings')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
