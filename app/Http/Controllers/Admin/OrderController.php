<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        $title = "لیست سفارشات";
        return view('admin.orders.orders', compact('title'));
    }

    public function orderDetails($order)
    {
        $title = "جزئیات سفارش";
      return view('admin.orders.order_details',compact('title','order'));
    }
}
