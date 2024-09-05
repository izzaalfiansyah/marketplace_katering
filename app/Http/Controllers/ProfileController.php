<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    function index(Request $req)
    {
        $user = User::find(Auth::id());

        $provinces = Province::orderBy('name')->get();
        $regencies = Regency::where('province_id', $user->province_id)->orderBy('name')->get();
        $districts = District::where('regency_id', $user->regency_id)->orderBy('name')->get();

        if ($province_id = $req->province_id) {
            $user->update(['province_id' => $req->province_id, 'regency_id' => null, 'district_id' => null]);
            $regencies = Regency::where('province_id', $req->province_id)->orderBy('name')->get();
        }

        if ($req->regency_id) {
            // return $req->regency_id;
            $user->update(['regency_id' => $req->regency_id, 'district_id' => null]);
            $districts = District::where('regency_id', $req->regency_id)->orderBy('name')->get();
        }

        if ($req->district_id) {
            $user->update(['district_id' => $req->district_id]);
        }

        return view('profile', compact('user', 'provinces', 'regencies', 'districts'));
    }

    function store(Request $req)
    {
        $user = User::find(Auth::id());

        $data = $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore(Auth::id()),
            ],
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'phone' => 'required|string',
            'role' => 'nullable|in:customer,merchant',
            'address' => 'required',
        ]);

        $user->update($data);

        return redirect('/profile')->with('success', 'Profil berhasil di simpan');
    }
}
