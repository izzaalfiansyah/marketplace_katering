@extends('layouts.home', [
    'title' => 'Profil Bisnis',
])

@section('content')
    <form class="card bg-body" method="POST">
        @csrf
        @method('POST')
        <div class="card-body">
            <h2 class="mb-10">Identitas Bisnis</h2>

            @method('POST')
            @csrf

            <div class="fv-row mb-7">
                <label class="form-label fw-bold text-dark fs-6">Nama</label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name"
                    autocomplete="off" value="{{ old('name', $merchant->name) }}" />
                @error('name')
                    <x-error-field>
                        {{ $errors->first('name') }}
                    </x-error-field>
                @enderror
            </div>

            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="form-label fw-bold text-dark fs-6">Deskripsi</label>
                <textarea class="form-control form-control-lg form-control-solid" name="description" autocomplete="off" rows="3">{{ old('description', $merchant->description) }}</textarea>
                @error('description')
                    <x-error-field>
                        {{ $errors->first('description') }}
                    </x-error-field>
                @enderror
            </div>

            <!--end::Input group-->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan Bisnis</button>
        </div>
    </form>
@endsection
