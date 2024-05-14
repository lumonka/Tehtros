<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartTable = DB::table('cart')->where('uid', $request->user()->id)->get();
        $goodCart = [];
        $total = 0;
        foreach ($cartTable as $cartItem) {
            $product = DB::table('products')->select('product_name', 'product_price', 'product_qty', 'product_image')->where('id', $cartItem->pid)->first();
            $total += $cartItem->qty * $product->product_price;
            array_push(
                $goodCart,
                (object)[
                    'id' => $cartItem->id,
                    'name' => $product->product_name,
                    'price' => $product->product_price,
                    'qty' => $cartItem->qty,
                    'limit' => $product->product_qty,
                    'image' => $product->product_image
                ]
            );
        }
        return view('cart', ['cart' => $goodCart, 'total' => $total]);
    }

    public function addToCart(Request $request)
    {
        $cartTable = DB::table('cart');
        $itemInCart = $cartTable->where('uid', $request->user()->id)->where('pid', $request->id);

        $product = DB::table('products')->where('id', $request->id)->first();

        if (is_null($itemInCart->first())) {
            $cartTable->insert(['uid' => $request->user()->id, 'pid' => $request->id, 'qty' => 1]);
        } elseif ($product->qty > $itemInCart->first()->qty) {
            $itemInCart->update(['qty' => $itemInCart->first()->qty + 1]);
        } else {
            return xml_error_string('err');
        }
    }

    public function changeQty(Request $request)
    {
        $products = DB::table('cart')->where('uid', $request->user()->id)->where('id', $request->id)->get();

        foreach ($products as $product) {
            if ($request->param == "incr") {
                $updatedQty = $product->qty + 1;
                DB::table('cart')->where('id', $product->id)->update(['qty' => $updatedQty]);
            } elseif ($request->param == "decr" && $product->qty > 1) {
                $updatedQty = $product->qty - 1;
                DB::table('cart')->where('id', $product->id)->update(['qty' => $updatedQty]);
            } elseif ($request->param == "decr" && $product->qty == 1) {
                DB::table('cart')->where('id', $product->id)->delete();
            }
        }


//        $product = DB::table('cart')->where('uid', $request->user()->id)->where('id', $request->id);
//        if ($request->param == "incr") {
//            $product->update(['qty' => $product->first()->qty + 1]);
//        }
//        if ($request->param == "decr" && $product->first()->qty > 1) {
//            $product->update(['qty' => $product->first()->qty - 1]);
//        } elseif($request->param == "decr" && $product->first()->qty == 1) {
//            $product->delete();
//        }
    }

    public function deleteProductToCart(Request $request, $productId)
    {
        $product = DB::table('cart')->where('uid', $request->user()->id)->where('id', $request->id);
        $product->delete();
        return redirect()->back()->with('success', 'Товар успешно удален из корзины');
    }

    public function cartItemCount()
    {
        $userId = auth()->id();

        $itemCount = DB::table('cart')->where('uid', $userId)->count();

        return $itemCount;
    }
}
