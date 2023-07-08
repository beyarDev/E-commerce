<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "order_detail";
    protected $primaryKey = 'order_detail_id';
    public function getUserOrders()
    {
        $orderDetails = [];
        $products = [];
        $user = Auth::user();
        $orders = Order::where("customer_id", $user->id)->get();
        foreach ($orders as $order) {
            $orderDetail = OrderDetail::where("order_id", $order->order_id)->get();
            $orderDetails = array_merge($orderDetails, $orderDetail->toArray());
        }
        foreach ($orderDetails as $orderDetail) {
            $product = Product::where("product_id", $orderDetail["product_id"])->get();
            $products = array_merge($products, $product->toArray());
        }
        return $products;
    }
}
