<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index()
    {
        if (!Auth::user()->province_id) {
            return redirect('/profile')->with('warning', 'Lengkapi identitasmu terlebih dahulu!');
        }

        return view('customer.index');
    }
}
