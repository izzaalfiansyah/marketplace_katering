@extends('layouts.home')

@section('content')
    <div class="card bg-body mb-10">
        <div class="card-body">
            Selamat datang di Marketplace Katering.
        </div>
    </div>

    @if (!Auth::user()->province_id)
        <div class="card bg-body mb-10">
            <div class="card-body">
                Identitas kamu belum lengkap. Segera lengkapi di <a href="{{ url('/profile') }}">sini</a>
            </div>
        </div>
    @endif

    @if (Auth::user()->merchant)
        @if (!Auth::user()->merchant->description)
            <div class="card bg-body">
                <div class="card-body">
                    Data bisnis usaha kamu belum lengkap. Klik di <a href="{{ url('/katering') }}">sini</a>
                </div>
            </div>
        @endif
    @endif
@endsection
