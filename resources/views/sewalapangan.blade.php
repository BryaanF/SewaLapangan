@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')
    <h2 class="text-center">Sewa Lapangan</h2>

    @foreach ($lapangans as $lapangan)
        <div class="card mx-auto mt-4 w-50" style="height:400px">
            <div class="image-container d-flex align-items-center justify-content-center"
                style="position: relative; height:100%; ">
                <img src="{{ $lapangan->url_foto }}" class="card-img-top img-fluid" alt="..."
                    style="height:100%; width:100%; object-fit:cover; object-position: center ; position :absolute; top:0; left:0; right:0; bottom:0; margin:auto;">
            </div>
            <div class="card-body" style="height: 50%">
                <h5 class="card-title">{{ $lapangan->nama }}</h5>
                <p class="card-text"><b>Biaya Sewa Per Jam : Rp. {{ $lapangan->biayasewa }}</b>
                    <br>{{ $lapangan->deskripsi }}
                </p>
                <a href="{{ route('formsewa', ['lapangan_id' => $lapangan->id]) }}" class="btn btn-primary">PESAN</a>
            </div>
        </div>
    @endforeach
@endsection
