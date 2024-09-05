@extends('layouts.home', [
    'title' => 'Pesanan Saya',
])

@section('actions')
    <a href="{{ url('/my-order/create') }}" class="btn btn-flex btn-center btn-dark btn-sm px-4">BUAT PESANAN</a>
@endsection

@section('content')
    <div class="card bg-body">
        <div class="card-body">
            @forelse ($orders as $order)
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Katering</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Jumlah Menu</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            @empty
                <div class="text-center">Anda belum membuat pesanan.</div>
            @endforelse
        </div>
    </div>
@endsection
