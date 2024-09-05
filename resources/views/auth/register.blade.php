@extends('layouts.auth')

@section('form')
    <form class="form w-100" method="post" action="{{ url('/register') }}">
        @method('POST')
        @csrf
        <!--begin::Heading-->
        <div class="mb-10 text-center">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Buat Akun Baru</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-semibold fs-4">Sudah punya akun?
                <a href="{{ url('/login') }}" class="link-primary fw-bold">Masuk di sini</a>
            </div>
            <!--end::Link-->
        </div>

        <div class="fv-row mb-7">
            <label class="form-label fw-bold text-dark fs-6">Nama</label>
            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name"
                autocomplete="off" value="{{ old('name') }}" />
            @error('name')
                <x-error-field>
                    {{ $errors->first('name') }}
                </x-error-field>
            @enderror
        </div>

        <div class="fv-row mb-7">
            <label class="form-label fw-bold text-dark fs-6">Nomor Telepon</label>
            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="phone"
                autocomplete="off" />
            @error('phone')
                <x-error-field>
                    {{ $errors->first('phone') }}
                </x-error-field>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <label class="form-label fw-bold text-dark fs-6">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email"
                autocomplete="off" value="{{ old('email') }}" />
            @error('email')
                <x-error-field>
                    {{ $errors->first('email') }}
                </x-error-field>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <label class="form-label fw-bold text-dark fs-6">Password</label>
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password"
                autocomplete="off" />
            @error('password')
                <x-error-field>
                    {{ $errors->first('password') }}
                </x-error-field>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <label class="form-label fw-bold text-dark fs-6">Konfirmasi Password</label>
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder=""
                name="password_confirmation" autocomplete="off" />
            @error('password_confirmation')
                <x-error-field>
                    {{ $errors->first('password_confirmation') }}
                </x-error-field>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1" checked disabled />
                <span class="form-check-label fw-semibold text-gray-700 fs-6">Saya menyetujui
                    <a href="javascript:void(0);" class="ms-1 link-primary">syarat dan ketentuan</a> berlaku.</span>
            </label>
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                Daftar
            </button>
        </div>
        <!--end::Actions-->
    </form>
@endsection
