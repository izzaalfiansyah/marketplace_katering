@extends('layouts.home', [
    'title' => 'Detail Pesanan',
])

@section('content')
    <div class="card mb-10 bg-body">
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Nama Katering</td>
                    <td>:</td>
                    <td>{{ $order->merchant->name }}</td>
                </tr>
                <tr>
                    <td>Kontak</td>
                    <td>:</td>
                    <td><a href="tel:{{ $order->merchant->user->phone }}">{{ $order->merchant->user->phone }}</a></td>
                </tr>
                <tr>
                    <td>Alamat Customer</td>
                    <td>:</td>
                    <td>
                        {{ $order->merchant->user->address }},
                        {{ ucwords(strtolower($order->merchant->user->district->name)) }},
                        {{ ucwords(strtolower($order->merchant->user->regency->name)) }},
                        {{ ucwords(strtolower($order->merchant->user->province->name)) }}
                    </td>
                </tr>
                <tr>
                    <td>Jadwal Pengiriman</td>
                    <td>:</td>
                    <td>{{ $order->schedule }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>{{ $order->status }}</td>
                </tr>
            </table>

            @if ($order->status == 'pending')
                <div class="mt-10">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancel-order">
                        Batalkan Pesanan
                    </button>
                </div>
            @endif
        </div>
    </div>
    <div class="card bg-body">
        <div class="card-body">
            <h2 class="mb-10">Daftar Menu</h2>

            <div class="table-responsive mb-10">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($order->detail as $detail)
                            <tr>
                                <td>{{ $detail->menu->name }} (Rp. {{ $detail->price }})</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->subtotal }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">data tidak tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total</th>
                            <th colspan="2" id="total">Rp. {{ $order->total }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <form method="post" action="{{ url('/my-order/' . $order->id . '/cancel') }}">
        @method('PUT')
        @csrf
        <x-modal id="cancel-order" header="Batalkan Pesanan">
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Alasan</label>
                <!--end::Label-->
                <!--begin::Input-->
                <textarea class="form-control form-control-lg form-control-solid" name="reason" autocomplete="off" required
                    rows="3"></textarea>
                <!--end::Input-->
            </div>

            <x-slot:footer>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Batalkan Pesanan</button>
            </x-slot:footer>
        </x-modal>
    </form>
@endsection
