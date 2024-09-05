<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function index()
    {
        $orders = Order::where('merchant_id', Auth::user()->merchant->id)->whereNotNull('schedule')->paginate(10)->withQueryString();

        return view('merchant.order.index', compact('orders'));
    }

    function show($id)
    {
        $order = Order::find($id);

        return view('merchant.order.detail', compact('order'));
    }

    function cancelOrder(Request $req, $id)
    {
        $data = $req->validate([
            'reason' => 'required',
        ]);

        $data['status'] = "canceled";

        Order::find($id)->update($data);

        return redirect('/order/' . $id)->with('success', 'Pesanan dibatalkan!');
    }

    function processOrder(Request $req, $id)
    {
        $data['status'] = "process";

        Order::find($id)->update($data);

        return redirect('/order/' . $id)->with('success', 'Pesanan diproses!');;
    }

    function completeOrder(Request $req, $id)
    {
        $data = $req->validate([
            'payment' => 'required',
        ]);

        $data['status'] = "completed";

        Order::find($id)->update($data);

        return redirect('/order/' . $id)->with('success', 'Pesanan telah diselesaikan!');;
    }
}
