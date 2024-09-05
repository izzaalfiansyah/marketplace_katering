@extends('layouts.home', [
    'title' => 'Pilih Menu di ' . $merchant->name,
]);

@section('content')
    <div class="row">
        <div class="col-xl-5 col mb-10">
            <div class="card bg-body">
                <div class="card-body">
                    <h2 class="mb-3">{{ $merchant->name }}</h2>
                    <div class="mb-10">
                        {{ $merchant->user->address }},
                        {{ ucwords(strtolower($merchant->user->district->name)) }},
                        {{ ucwords(strtolower($merchant->user->regency->name)) }},
                        {{ ucwords(strtolower($merchant->user->province->name)) }}
                        <br>
                        <a href="tel:{{ $merchant->user->phone }}">{{ $merchant->user->phone }}</a>
                    </div>
                    <p>{{ $merchant->description }}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-7 col mb-10">
            <div class="card bg-body">
                <div class="card-body">
                    <h2 class="mb-10">Menu Pilihan</h2>

                    <div class="table-responsive mb-10">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @forelse ($order->detail as $detail)
                                    <tr>
                                        <td>{{ $detail->menu->name }} (Rp. {{ $detail->price }})</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ $detail->subtotal }}</td>
                                        <td>
                                            <form action="{{ url('/my-order/destroy/' . $order->id . '/' . $detail->id) }}"
                                                class="d-inline un-inline" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="un-h-5 un-w-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $total += $detail->subtotal;
                                    @endphp
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">data tidak tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Total</th>
                                    <th colspan="2">Rp. {{ number_format($total) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    @if (count($order->detail) > 0)
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#buat-pesanan"
                            class="btn btn-primary">Buat Pesanan</button>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-12 col mb-10">
            <form class="card bg-body mb-10" id="form-filter">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 mb-7">
                            <div class="fv-row">
                                <label class="form-label fs-6 fw-bold text-dark">Cari</label>
                                <input class="form-control form-control-lg form-control-solid" name="q"
                                    placeholder="Ketikkan Sesuatu" value="{{ isset($_GET['q']) ? $_GET['q'] : '' }}"
                                    onchange="{
                                    document.querySelector('#form-filter').submit();
                                }" />
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="fv-row">
                                <label class="form-label fs-6 fw-bold text-dark">Jenis</label>
                                <select
                                    onchange="{
                                    document.querySelector('#form-filter').submit();
                                }"
                                    class="form-control form-control-lg form-control-solid" name="category" required>
                                    <option value="">Semua Jenis</option>
                                    @foreach ($categories as $category)
                                        <option
                                            {{ isset($_GET['category']) ? ($_GET['category'] == $category->id ? 'selected' : '') : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                @forelse ($menus as $menu)
                    <div class="col-lg-4 col-6">
                        <div class="card bg-body">
                            <img src="{{ $menu->photo_url }}" alt="" class="!un-h-200px card-img"
                                style="object-fit: cover" />
                            <div class="card-body">
                                <div class="card-title">{{ $menu->name }}</div>
                                <div class="mt-2">Rp. {{ number_format($menu->price) }}</div>
                            </div>
                            <div class="card-footer">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-tambah-menu"
                                    onclick="{
                                    $('#modal-tambah-menu [name=menu_id]').val('{{ $menu->id }}');
                                    $('#modal-tambah-menu [name=name]').val('{{ $menu->name }}');
                                    $('#modal-tambah-menu [name=price]').val('{{ $menu->price }}');
                                    $('#modal-tambah-menu [name=subtotal]').val('{{ $menu->price }}');
                            }"
                                    class="btn btn-primary btn-sm">PESAN</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <div class="card bg-body">
                            <div class="card-body text-center">tidak tersedia.</div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <form method="post" action="{{ url('/my-order/' . $order->id) }}">
        @method('PUT')
        @csrf
        <x-modal id="buat-pesanan" header="Buat Pesanan">
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Tanggal Pengiriman</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="date" name="schedule_date"
                    autocomplete="off" required />
                <!--end::Input-->
            </div>

            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Jam Pengiriman</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="time" name="schedule_time"
                    autocomplete="off" required />
                <!--end::Input-->
            </div>

            <x-slot:footer>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Buat Pesanan</button>
            </x-slot:footer>
        </x-modal>
    </form>

    <form method="post" id="form-tambah-menu" action="{{ url('/my-order/create/' . $order->id) }}">
        @method('POST')
        @csrf
        <x-modal id="modal-tambah-menu" header="Tambah Pesanan">
            <input class="un-hidden" type="text" name="menu_id" autocomplete="off" required />
            <input class="un-hidden" type="text" name="subtotal" autocomplete="off" required />
            <input class="un-hidden" type="text" name="price" autocomplete="off" required />
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Nama Menu</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" disabled type="text" name="name"
                    autocomplete="off" required />
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Harga</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" disabled type="text" name="price"
                    autocomplete="off" required />
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Jumlah</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="text" name="quantity"
                    autocomplete="off" required value="1" min="1" />
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Subtotal</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" disabled type="text" name="subtotal"
                    autocomplete="off" required />
                <!--end::Input-->
            </div>

            <x-slot:footer>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </x-slot:footer>
        </x-modal>
    </form>
@endsection

@section('script')
    <script>
        $('#form-tambah-menu [name=quantity]').on('input', (e) => {
            const price = parseInt($('#form-tambah-menu [name=price]').val());
            $('#form-tambah-menu [name=subtotal]').val(price * parseInt(e.currentTarget.value));
        });
    </script>
@endsection
