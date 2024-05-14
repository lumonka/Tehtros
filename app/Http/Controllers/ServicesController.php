<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        $products = DB::table("products")->get();

        $categoryTros = DB::table('products')->where("product_category", 1)->get();

        $nozzles = DB::table('products')->where("product_category", 2)->get();

        $params = collect($request->query());
        $categories = DB::table('category')->get();

        if ($params->get('sort_by')) {
            $products = $products->sortBy($params->get('sort_by'));
        }

        if ($params->get('sort_by_desc')) {
            $products = $products->sortByDesc($params->get('sort_by_desc'));
        }

        if ($params->get('filter')) {
            $products = $products->where('product_category', $params->get('filter'));
        }

        return view('services', [
            'products' => $products,
            'categoryTros' => $categoryTros,
            'nozzles' => $nozzles,
            'params' => $params,
            'categories' => $categories
        ]);
    }

    public function show(Product $product, Request $request)
    {
        $id = $request->id;
        $products = DB::table('products')->where('id', $id)->first();

        return view('product', compact('product'), [
            'products' => $products,
        ]);
    }
}
