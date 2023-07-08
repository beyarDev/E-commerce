<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{


    public function createOrder(Request $req)
    {
        //checking if user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $total = 0;
            $orderData = $req->input()["products"];
            // we should retrieve actual price of the products from the database
            // using their ID's as we can't trust data from client side
            // depending how you setup your payment service you might not need to do so

            // counting the total price for all products;
            foreach ($orderData as $order) {
                $totalPrice = $order["productPrice"] * $order["quantity"];
                $total += $totalPrice;
            }
            // in a completed application you would send a request to a payment server like stripe with
            // order details

            // inserting a record into oreders table
            $order = new Order();
            $order->status = "pending";
            $order->customer_id = $user->id;
            $order->total_price = $total;
            $order->save();

            $orderId = $order->order_id;
            // inserting multipe records into order_details table depending
            // on how many products we have in $orderData
            foreach ($orderData as $order) {
                $orderDetail = new OrderDetail();
                $orderDetail->quantity = $order["quantity"];
                $orderDetail->price = $order["productPrice"];
                $orderDetail->product_id = $order["productId"];
                $orderDetail->order_id = $orderId;
                $orderDetail->save();
            }
            return response()->json([
                'message' => 'success',
            ], 200);
        } else {
            return response()->json([
                'message' => 'please login',
            ], 403);
        }
    }
}
