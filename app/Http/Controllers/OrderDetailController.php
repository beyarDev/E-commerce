<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetail = new OrderDetail();
        if (Auth::check()) {
            return view("orders", [
                "orders" => $orderDetail->getUserOrders()
            ]);
        } else {
            return redirect('dashboard');
        }
    }
    public function cancelOrder(Request $req)
    {
        $product_id = $req->input()['product_id'];
        OrderDetail::where('product_id', $product_id)->delete();
        return response()->json([
            'message' => 'success',
        ], 200);
    }
}
