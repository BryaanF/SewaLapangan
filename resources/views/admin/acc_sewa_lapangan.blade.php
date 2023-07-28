@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')
    <h2 class="text-center">Acc Sewa Lapangan</h2>
    @foreach ($sewas as $sewa)
        @if ($sewa->acc == 1)
            <div class="card mx-auto mt-4 w-50" style="height:600px">
                <div class="image-container d-flex align-items-center justify-content-center"
                    style="position: relative; height:100%; ">
                    <img src="{{ $sewa->lapangan->url_foto }}" class="card-img-top img-fluid" alt="..."
                        style="height:100%; width:100%; object-fit:cover; object-position: center ; position :absolute; top:0; left:0; right:0; bottom:0; margin:auto;">
                </div>
                <div class="card-body" style="height: 50%">
                    <h5 class="card-title">{{ $sewa->lapangan->nama }}</h5>
                    <p class="card-text"><b>Nama Penyewa : {{ $sewa->nama_penyewa }}</b>
                        <br>
                        Tanggal Sewa : {{ $sewa->tanggal }}
                        <br>
                        Jam Mulai : {{ $sewa->jam_mulai }}
                        <br>
                        Jam Selesai : {{ $sewa->jam_selesai }}
                        <br>
                        <br>
                        Total Biaya Sewa : Rp. {{ $sewa->biayatotal }}

                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('exportPdf', ['id' => $sewa->id]) }}" class="btn btn-primary">CETAK
                            TIKET (PDF)</a>
                        <a href="{{ route('btlaccsewa', ['id' => $sewa->id]) }}" class="btn btn-danger">BATAL ACC</a>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
