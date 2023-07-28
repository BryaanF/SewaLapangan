@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')
    <div class="container-sm my-5">
        <form action="{{ route('admin.update', ['admin' => $lapangan->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <h4>Edit Lapangan</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama Lapangan</label>
                            <input class="form-control
    @error('nama') is-invalid @enderror" type="text"
                                name="nama" id="nama" value="{{ $errors->any() ? old('nama') : $lapangan->nama }}"
                                placeholder="Enter First Name">
                            @error('nama')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input class="form-control @error('alamat')
    is-invalid @enderror" type="text"
                                name="alamat" id="alamat"
                                value="{{ $errors->any() ? old('alamat') : $lapangan->alamat }}"
                                placeholder="Enter Last Name">
                            @error('alamat')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="biayaSewa" class="form-label">Biaya Sewa</label>
                            <input class="form-control @error('biayaSewa')
    is-invalid @enderror" type="number"
                                name="biayaSewa" id="biayaSewa"
                                value="{{ $errors->any() ? old('biayaSewa') : $lapangan->biayasewa }}"
                                placeholder="Enter
    biayaSewa">
                            @error('email')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="urlFoto" class="form-label">URL Foto </label>
                            <input class="form-control @error('urlFoto')
    is-invalid @enderror" type="text"
                                name="urlFoto" id="urlFoto"
                                value="{{ $errors->any() ? old('urlFoto') : $lapangan->url_foto }}" placeholder="Enter Age">
                            @error('urlFoto')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi')
    is-invalid @enderror" name="deskripsi" id="deskripsi"
                                placeholder="Enter Age">{{ $errors->any() ? old('deskripsi') : $lapangan->deskripsi }}</textarea>
                            @error('deskripsi')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('admin.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle
    me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark
    btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
