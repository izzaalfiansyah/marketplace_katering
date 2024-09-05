@extends('layouts.auth')

@section('form')
    <form class="form w-100" novalidate="novalidate" action="{{ url('/login') }}" method="POST">
        @method('POST')
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Masuk ke akun anda</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-semibold fs-4">Belum punya akun?
                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal-register"
                    class="link-primary fw-bold">Buat di
                    sini</a>
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bold text-dark">Email</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off"
                value="{{ old('email') }}" />
            @error('email')
                <x-error-field>{{ $errors->first('email') }}</x-error-field>
            @enderror
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bold text-dark fs-6 mb-0">Password</label>
                <!--end::Label-->
                <!--begin::Link-->
                <a href="javascript:void(0);" class="link-primary fs-6 fw-bold">Lupa Password ?</a>
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                autocomplete="off" />
            @error('password')
                <x-error-field>{{ $errors->first('password') }}</x-error-field>
            @enderror
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                Masuk
            </button>
        </div>
        <!--end::Actions-->
    </form>

    <x-modal id="modal-register" header="Daftar Sebagai">
        <a href="{{ url('/register?role=merchant') }}" class="btn btn-light-primary fw-bold w-100 mb-8">
            Merchant (Usaha Katering)</a>
        <a href="{{ url('/register') }}" class="btn btn-light-primary fw-bold w-100 mb-8">
            Costumer</a>
    </x-modal>
@endsection
