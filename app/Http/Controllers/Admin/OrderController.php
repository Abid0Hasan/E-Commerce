<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\OrderConfirmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }


    public function status($id)
    {
        $order  = Order::find($id);
        $order->status = true;
        $order->save();
        Notification::route('mail', $order->user->email)
            ->notify(new OrderConfirmed());

        return redirect()->back()->with('success', 'Order Approved.');

    }



    public function destroy($id)
    {
       $order = Order::find($id);
       $order->delete();
       return redirect()->back()->with('success', 'Order Deleted.');
    }


}
