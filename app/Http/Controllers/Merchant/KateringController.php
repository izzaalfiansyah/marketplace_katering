<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KateringController extends Controller
{
    function index()
    {
        $merchant = Merchant::where('user_id', Auth::id())->first();

        return view('merchant.katering.index', compact('merchant'));
    }
    function store(Request $req)
    {
        $merchant = Merchant::where('user_id', Auth::id())->first();

        $data = $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => 'required',
        ]);

        $merchant->update($data);

        return redirect('/katering')->with('success', 'Bisnis berhasil di simpan');
    }
}
