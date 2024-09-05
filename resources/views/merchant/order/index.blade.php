@extends('layouts.home', [
    'title' => 'Pesanan Saya',
])

@section('content')
    <div class="card bg-body">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
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
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->schedule }}</td>
                                <td>{{ count($order->detail) }}</td>
                                <td>{{ $order->status }}</td>
                                <td>Rp. {{ number_format($order->total) }}</td>
                                <td>
                                    <a href="{{ url('/order/' . $order->id) }}" class="btn btn-sm btn-primary">Detail
                                        Pesanan</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Anda belum memiliki pesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card bg-body mt-10">
        <div class="card-body">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
