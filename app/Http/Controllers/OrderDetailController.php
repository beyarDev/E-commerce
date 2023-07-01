<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use App\Models\Order;

class OrderDetailController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $orderDetails = [];
            $user = Auth::user();
            $orders = Order::where("customer_id", $user->id)->get();
            foreach($orders as $order){
                $orderDetail = OrderDetail::where("order_id", $order->order_id)->get();
                $orderDetails = array_merge($orderDetails, $orderDetail->toArray());
            }
            
            return view("orders", [
                "orders" => $orderDetails
            ]);
        } else {
            return view("login");
        }
    }
}
