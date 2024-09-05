@extends('layouts.home', [
    'title' => 'Pesanan Saya',
])

@section('actions')
    <a href="{{ url('/my-order/create') }}" class="btn btn-flex btn-center btn-dark btn-sm px-4">BUAT PESANAN</a>
@endsection

@section('content')
    <div class="card bg-body">
        <div class="card-body">
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
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->merchant->name }}</td>
                                <td>{{ $order->schedule }}</td>
                                <td>{{ count($order->detail) }}</td>
                                <td>{{ $order->status }}</td>
                                <td>Rp. {{ number_format($order->total) }}</td>
                                <td>
                                    <a href="{{ url('/my-order/' . $order->id) }}" class="btn btn-sm btn-primary">Detail
                                        Pesanan</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Anda belum membuat pesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
