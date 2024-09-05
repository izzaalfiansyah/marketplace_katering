@extends('layouts.home', [
    'title' => 'Pilih Katering',
])

@section('content')
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
                <div class="col-xl-4">
                    <div class="fv-row">
                        <label class="form-label fs-6 fw-bold text-dark">Provinsi</label>
                        <select
                            onchange="{
                            $('#form-filter [name=regency_id]').val('');
                            $('#form-filter [name=district_id]').val('');
                            document.querySelector('#form-filter').submit();
                        }"
                            class="form-control form-control-lg form-control-solid" name="province_id" required>
                            <option value="">Semua Provinsi</option>
                            @foreach ($provinces as $province)
                                <option
                                    {{ isset($_GET['province_id']) ? ($_GET['province_id'] == $province->id ? 'selected' : '') : '' }}
                                    value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if (count($regencies) > 0)
                    <div class="col-xl-4">
                        <div class="fv-row">
                            <label class="form-label fs-6 fw-bold text-dark">Kota/Kabupaten</label>
                            <select
                                onchange="{
                                $('#form-filter [name=district_id]').val('');
                                document.querySelector('#form-filter').submit();
                            }"
                                class="form-control form-control-lg form-control-solid" name="regency_id" required>
                                <option value="">Semua Kota/Kabupaten</option>
                                @foreach ($regencies as $regency)
                                    <option
                                        {{ isset($_GET['regency_id']) ? ($_GET['regency_id'] == $regency->id ? 'selected' : '') : '' }}
                                        value="{{ $regency->id }}">{{ $regency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                @if (count($districts) > 0)
                    <div class="col-xl-4">
                        <div class="fv-row">
                            <label class="form-label fs-6 fw-bold text-dark">Kecamatan</label>
                            <select
                                onchange="{
                                document.querySelector('#form-filter').submit();
                            }"
                                class="form-control form-control-lg form-control-solid" name="district_id" required>
                                <option value="">Semua Kecamatan</option>
                                @foreach ($districts as $district)
                                    <option
                                        {{ isset($_GET['district_id']) ? ($_GET['district_id'] == $district->id ? 'selected' : '') : '' }}
                                        value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </form>
    @if (isset($_GET['q']) || isset($_GET['category']))
        <div class="card bg-body mb-10">
            <div class="card-body">
                <ul>
                    @if ($_GET['q'])
                        <li>
                            Menampilkan usaha katering yang menyediakan makanan dengan kata kunci
                            <strong>"{{ $_GET['q'] }}"</strong>.
                        </li>
                    @endif
                    @if ($_GET['category'])
                        <li>
                            Menampilkan usaha katering yang menyediakan makanan dari kategori terpilih.
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    @endif
    <div class="row">
        @forelse ($merchants as $merchant)
            <div class="col-xl-6 mb-5">
                <div class="card bg-body">
                    <div class="card-body">
                        <h2 class="mb-3">{{ $merchant->name }}</h2>
                        <div class="mb-10">
                            <i>
                                {{ $merchant->user->address }},
                                {{ ucwords(strtolower($merchant->user->district->name)) }},
                                {{ ucwords(strtolower($merchant->user->regency->name)) }},
                                {{ ucwords(strtolower($merchant->user->province->name)) }}
                            </i>
                        </div>
                        <p>{{ $merchant->description }}</p>
                        <a href="{{ url('/my-order/create/merchant/' . $merchant->id) }}" class="btn btn-primary btn-sm">
                            LIHAT SELENGKAPNYA
                        </a>
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

    <div class="card bg-body mt-10">
        <div class="card-body">
            {{ $merchants->links() }}
        </div>
    </div>
@endsection
