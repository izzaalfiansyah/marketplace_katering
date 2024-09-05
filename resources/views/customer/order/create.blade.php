@extends('layouts.home', [
    'title' => 'Pilih Katering',
])

@section('content')
    <form class="card bg-body mb-10" id="form-filter">
        <div class="card-body">
            <div class="row">
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
                @isset($_GET['province_id'])
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
                @endisset
                @isset($_GET['regency_id'])
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
                @endisset
            </div>
        </div>
    </form>
    <div class="row">
        @forelse ($merchants as $merchant)
            <div class="col-xl-6">
                <div class="card bg-body">
                    <div class="card-body">
                        <h2 class="mb-5">{{ $merchant->name }}</h2>
                        <p>{{ $merchant->description }}</p>
                    </div>
                    <div class="card-footer">
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
@endsection
