<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->user()->id;
        $userAdmin = DB::table('users')->where("id", $id)->get();

        $countAllUsers = DB::table('users')->get();

        $countUsers = DB::table('users')->where("group", 1)->get();

        $countAdmins = DB::table('users')->where("group", 2)->get();

        $groups = DB::table('roles')->get();

        $products = DB::table('products')->get();

        $categoryTros = DB::table('products')->where("product_category", 1)->get();

        $nozzles = DB::table('products')->where("product_category", 2)->get();

        return view('admin.index', [
            'userAdmin' => $userAdmin,
            'admins' => $countAdmins,
            'users' => $countUsers,
            'allUsers' => $countAllUsers,
            'groups' => $groups,
            'products' => $products,
            'categoryTros' => $categoryTros,
            'nozzles' => $nozzles
        ]);
    }

    public function servicesPage(Request $request)
    {
        $id = $request->user()->id;
        $userAdmin = DB::table('users')->where("id", $id)->get();
        $params = collect($request->query());
        $categories = DB::table('category')->get();

        $products = DB::table('products')->get();

        $categoryTros = DB::table('products')->where("product_category", 1)->get();

        $nozzles = DB::table('products')->where("product_category", 2)->get();

        /* FILTER PRODUCTS START */
        if ($params->get('sort_by')) {
            $products = $products->sortBy($params->get('sort_by'));
        }

        if ($params->get('sort_by_desc')) {
            $products = $products->sortByDesc($params->get('sort_by_desc'));
        }

        if ($params->get('filter')) {
            $products = $products->where('product_category', $params->get('filter'));
        }
        /* FILTER PRODUCTS END */

        return view('admin.services', [
            'userAdmin' => $userAdmin,
            'products' => $products,
            'categoryTros' => $categoryTros,
            'nozzles' => $nozzles,
            'params' => $params,
            'categories' => $categories
        ]);
    }

    public function ordersPage(Request $request)
    {
        $id = $request->user()->id;
        $userAdmin = DB::table('users')->where("id", $id)->get();

        // Получаем все заказы без фильтрации по пользователю
        $allOrders = DB::table('orders')->get();

        $goodOrders = [];

        // Теперь проходимся по всем заказам
        foreach ($allOrders as $order) {
            $openedOrder = $order;
            $date = $openedOrder->created_at;
            $orderNumber = $openedOrder->number;
            $orderStatus = $openedOrder->status;
            $totalPrice = 0;
            $totalQty = 0;
            $products = [];

            // Извлекаем товары из текущего заказа
            $orderItems = DB::table('orders')->where('id', $order->id)->get();
            foreach ($orderItems as $orderItem) {
                $product = DB::table('products')->where('id', $orderItem->id)->first();
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

        return view('admin.orders', [
            'userAdmin' => $userAdmin,
            'orders' => $goodOrders,
            'allOrders' => $allOrders, // Передаем все заказы в представление
        ]);
    }
    public function newsPage(Request $request)
    {
        $id = $request->user()->id;
        $userAdmin = DB::table('users')->where("id", $id)->get();

        $newsTable = DB::table('news')->get();

        return view('admin.news', [
            'newsTable' => $newsTable,
            'userAdmin' => $userAdmin
        ]);
    }
}
