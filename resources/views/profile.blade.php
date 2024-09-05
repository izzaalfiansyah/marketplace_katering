@extends('layouts.home', [
    'title' => 'Profil',
])

@section('content')

    <form id="form-filter">
        <input type="text" class="un-hidden" name="province_id" value="{{ $user->province_id }}">
        <input type="text" class="un-hidden" name="regency_id" value="{{ $user->regency_id }}">
        <input type="text" class="un-hidden" name="district_id" value="{{ $user->district_id }}">
    </form>

    <form class="card bg-body" method="POST">
        @csrf
        @method('POST')
        <div class="card-body">
            <h2 class="mb-10">Identitas Diri</h2>

            @method('POST')
            @csrf

            <div class="fv-row mb-7">
                <label class="form-label fw-bold text-dark fs-6">Nama</label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name"
                    autocomplete="off" value="{{ old('name', $user->name) }}" />
                @error('name')
                    <x-error-field>
                        {{ $errors->first('name') }}
                    </x-error-field>
                @enderror
            </div>

            <div class="fv-row mb-7">
                <label class="form-label fw-bold text-dark fs-6">Nomor Telepon</label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="phone"
                    autocomplete="off" value="{{ old('phone', $user->phone) }}" />
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
                    autocomplete="off" value="{{ old('email', $user->email) }}" />
                @error('email')
                    <x-error-field>
                        {{ $errors->first('email') }}
                    </x-error-field>
                @enderror
            </div>

            <div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="fv-row mb-7">
                            <label class="form-label fs-6 fw-bold text-dark">Provinsi</label>
                            <select
                                onchange="{
                                $('#form-filter [name=province_id]').val(this.value);
                                $('#form-filter [name=regency_id]').val('');
                                $('#form-filter [name=district_id]').val('');
                                document.querySelector('#form-filter').submit();
                            }"
                                class="form-control form-control-lg form-control-solid" name="province_id" required>
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $province)
                                    <option {{ $user->province_id == $province->id ? 'selected' : '' }}
                                        value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @isset($user->province_id)
                        <div class="col-xl-4">
                            <div class="fv-row mb-7">
                                <label class="form-label fs-6 fw-bold text-dark">Kota/Kabupaten</label>
                                <select
                                    onchange="{
                                    $('#form-filter [name=regency_id]').val(this.value);
                                    $('#form-filter [name=district_id]').val('');
                                    document.querySelector('#form-filter').submit();
                                }"
                                    class="form-control form-control-lg form-control-solid" name="regency_id" required>
                                    <option value="">Pilih Kota/Kabupaten</option>
                                    @foreach ($regencies as $regency)
                                        <option {{ $user->regency_id == $regency->id ? 'selected' : '' }}
                                            value="{{ $regency->id }}">{{ $regency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endisset
                    @isset($user->regency_id)
                        <div class="col-xl-4">
                            <div class="fv-row mb-7">
                                <label class="form-label fs-6 fw-bold text-dark">Kecamatan</label>
                                <select class="form-control form-control-lg form-control-solid" name="district_id" required>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($districts as $district)
                                        <option {{ $user->district_id == $district->id ? 'selected' : '' }}
                                            value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>

            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="form-label fw-bold text-dark fs-6">Alamat</label>
                <textarea class="form-control form-control-lg form-control-solid" type="address" placeholder="" name="address"
                    autocomplete="off" rows="3">{{ old('address', $user->address) }}</textarea>
                @error('address')
                    <x-error-field>
                        {{ $errors->first('address') }}
                    </x-error-field>
                @enderror
            </div>

            <!--end::Input group-->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan Profil</button>
        </div>
    </form>
@endsection
