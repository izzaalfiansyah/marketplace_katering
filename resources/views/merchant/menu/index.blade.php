@extends('layouts.home', [
    'title' => 'Daftar Menu',
])

@section('actions')
    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal-create"
        class="btn btn-flex btn-center btn-dark btn-sm px-4">TAMBAH</a>
@endsection

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
            </div>
        </div>
    </form>

    <div class="row">
        @forelse ($menus as $menu)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="card bg-body">
                    <img src="{{ $menu->photo_url }}" alt="" class="!un-h-200px card-img"
                        style="object-fit: cover" />
                    <div class="card-body">
                        <div class="card-title">{{ $menu->name }}</div>
                        <div class="mt-2">Rp. {{ number_format($menu->price) }}</div>
                    </div>
                    <div class="card-footer">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit"
                            onclick="{
                            document.querySelector('#form-edit').action = '{{ url('/menu/' . $menu->id) }}';
                            document.querySelector('#modal-edit [name=name]').value = '{{ $menu->name }}';
                            document.querySelector('#modal-edit [name=category_id]').value = '{{ $menu->category_id }}';
                            document.querySelector('#modal-edit [name=description]').value = '{{ $menu->description }}';
                            document.querySelector('#modal-edit [name=price]').value = '{{ $menu->price }}';
                        }"
                            class="btn btn-primary btn-sm">EDIT</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete"
                            onclick="{
                            document.querySelector('#form-delete').action = '{{ url('/menu/' . $menu->id) }}';
                        }">HAPUS</button>
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

    <form action="{{ url('/menu') }}" method="post" id="form-create" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <x-modal id="modal-create" header="Tambah Menu">
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Nama Menu</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="text" name="name"
                    autocomplete="off" value="{{ old('name') }}" required />
                @error('name')
                    <x-error-field>{{ $errors->first('name') }}</x-error-field>
                @enderror
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Kategori</label>
                <!--end::Label-->
                <!--begin::Input-->
                <select class="form-control form-control-lg form-control-solid" name="category_id" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <x-error-field>{{ $errors->first('category_id') }}</x-error-field>
                @enderror
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Deskripsi</label>
                <!--end::Label-->
                <!--begin::Input-->
                <textarea class="form-control form-control-lg form-control-solid" name="description" rows="3" required>{{ old('description') }}</textarea>
                @error('description')
                    <x-error-field>{{ $errors->first('description') }}</x-error-field>
                @enderror
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Harga</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="number" name="price"
                    autocomplete="off" value="{{ old('price') }}" required />
                @error('price')
                    <x-error-field>{{ $errors->first('price') }}</x-error-field>
                @enderror
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Foto Pendukung</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="file" name="photo"
                    autocomplete="off" value="{{ old('photo') }}" accept="image/*" />
                @error('photo')
                    <x-error-field>{{ $errors->first('photo') }}</x-error-field>
                @enderror
                <!--end::Input-->
            </div>

            <x-slot:footer>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </x-slot:footer>
        </x-modal>
    </form>

    <form action="{{ url('/menu') }}" method="post" id="form-edit" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-modal id="modal-edit" header="Edit Menu">
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Nama Menu</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="text" name="name"
                    autocomplete="off" value="{{ old('name') }}" required />
                @error('name')
                    <x-error-field>{{ $errors->first('name') }}</x-error-field>
                @enderror
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Kategori</label>
                <!--end::Label-->
                <!--begin::Input-->
                <select class="form-control form-control-lg form-control-solid" name="category_id" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <x-error-field>{{ $errors->first('category_id') }}</x-error-field>
                @enderror
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Deskripsi</label>
                <!--end::Label-->
                <!--begin::Input-->
                <textarea class="form-control form-control-lg form-control-solid" name="description" rows="3" required>{{ old('description') }}</textarea>
                @error('description')
                    <x-error-field>{{ $errors->first('description') }}</x-error-field>
                @enderror
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Harga</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="number" name="price"
                    autocomplete="off" value="{{ old('price') }}" required />
                @error('price')
                    <x-error-field>{{ $errors->first('price') }}</x-error-field>
                @enderror
                <!--end::Input-->
            </div>
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bold text-dark">Foto Pendukung</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="file" name="photo"
                    autocomplete="off" value="{{ old('photo') }}" accept="image/*" />
                @error('photo')
                    <x-error-field>{{ $errors->first('photo') }}</x-error-field>
                @enderror
                <!--end::Input-->
            </div>

            <x-slot:footer>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </x-slot:footer>
        </x-modal>
    </form>

    <form action="{{ url('/menu') }}" method="post" id="form-delete">
        @method('DELETE')
        @csrf
        <x-modal id="modal-delete" header="Hapus Menu">
            <p>Anda yakin menghapus menu terpilih?</p>

            <x-slot:footer>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </x-slot:footer>
        </x-modal>
    </form>
@endsection
