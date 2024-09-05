<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Menu;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function index()
    {
        $orders = Order::where('user_id', Auth::id())->whereNotNull('schedule')->paginate(10);

        return view('customer.order.index', compact('orders'));
    }

    function show($id)
    {
        $order = Order::find($id);

        return view('customer.order.detail', compact('order'));
    }

    function create(Request $req)
    {
        $builder = Merchant::select('merchants.*')->leftJoin('users', 'users.id', '=', 'merchants.user_id');

        $provinces = Province::orderBy('name')->get();
        $regencies = [];
        $districts = [];

        if ($req->province_id) {
            $regencies = Regency::where('province_id', $req->province_id)->orderBy('name')->get();

            $builder = $builder->where('users.province_id', $req->province_id);
        }

        if ($req->regency_id) {
            // return $req->regency_id;
            $districts = District::where('regency_id', $req->regency_id)->orderBy('name')->get();

            $builder = $builder->where('users.regency_id', $req->regency_id);
        }

        if ($req->district_id) {
            $builder = $builder->where('users.district_id', $req->district_id);
        }

        $merchants = $builder->paginate(20);

        return view('customer.order.create', compact('merchants', 'provinces', 'regencies', 'districts'));
    }

    function createByMerchant(Request $req, $merchantId)
    {
        $order = Order::where('merchant_id', $merchantId)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();

        if ($order?->schedule) {
            $order = Order::create([
                'merchant_id' => $merchantId,
                'user_id' => Auth::id(),
            ]);
        }


        $builder = Menu::where('merchant_id', $merchantId);

        if ($q = $req->q) {
            $builder = $builder->where(function ($query) use ($q) {
                return $query->where('name', 'like', "%$q%");
            });
        }

        $menus = $builder->get();

        return view('customer.order.create-by-merchant', compact('menus', 'order'));
    }

    function update(Request $req, $id)
    {
        $req->validate([
            'schedule_date' => 'required|date_format:Y-m-d',
            'schedule_time' => 'required|date_format:H:i',
        ]);

        $data['schedule'] = $req->schedule_date . ' ' . $req->schedule_time;

        $detail = OrderDetail::where('order_id', $id)->get();

        $total = 0;

        foreach ($detail as $d) {
            $total += $d->subtotal;
        }

        $data['total'] = $total;

        Order::where('id', $id)->update($data);

        return redirect('/my-order/' . $id)->with('success', 'Pesanan berhasil di buat. Silahkan menunggu!');
    }

    function addDetails(Request $req, $orderId)
    {
        $data = $req->validate([
            'menu_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'subtotal' => 'required',
        ]);

        $data['order_id'] = $orderId;

        OrderDetail::create($data);

        return redirect()->back()->with('success', 'Menu telah ditambahkan!');
    }

    function destroyDetails($orderId, $detailId)
    {
        OrderDetail::destroy($detailId);

        return redirect()->back()->with('success', 'Menu terhapus!');
    }

    function cancelOrder(Request $req, $id)
    {
        $data = $req->validate([
            'reason' => 'required',
        ]);

        $data['status'] = "canceled";

        Order::find($id)->update($data);

        return redirect('/my-order/' . $id)->with('success', 'Pesanan dibatalkan!');;
    }
}
