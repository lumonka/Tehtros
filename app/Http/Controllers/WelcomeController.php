<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $catalog = DB::table('products')->paginate(8);

        $news = DB::table('news')->get();

        return view("welcome", [
            'products' => $catalog,
            'news' => $news
        ]);
    }
}
