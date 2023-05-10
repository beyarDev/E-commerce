<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('welcome', [
            'products' => $products
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('product', [
            'product' => $product
        ]);
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('searchItem');
        $products = Product::where('name', 'ILIKE', '%' . $searchTerm . '%')->get();
        return view('welcome', [
            'products' => $products
        ]);
    }
    public function showBasket()
    {
        return view('basket');
    }
}
