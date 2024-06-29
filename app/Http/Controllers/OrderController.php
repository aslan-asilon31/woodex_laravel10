<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Services\Midtrans\CreateSnapTokenService;

class OrderController extends Controller
{

    
    public function index(){
        // $query = "SELECT * FROM orders";
        // $orders = DB::connection('mysql')->select($query);
        // return $orders;

        return view('orders.index');

    }


    public function show(Order $order)
    {
         $snapToken = $order->snap_token;
         if (is_null($snapToken)) {
             // If snap token is still NULL, generate snap token and save it to database

             $midtrans = new CreateSnapTokenService($order);
             $snapToken = $midtrans->getSnapToken();

             $order->snap_token = $snapToken;
             $order->save();
         }

         return view('orders.index', compact('order', 'snapToken'));
    }
}
