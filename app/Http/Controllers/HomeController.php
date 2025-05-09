<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        // take() = ambil 6 data lalu utk mengambil dari databasenya menggunakan get()
        $categories = Category::take(6)->get();

        $products = Product::with(['galleries'])->take(8)->get();

        return view('pages.home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
