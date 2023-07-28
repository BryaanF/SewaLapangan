@extends('layouts.app')
@section('content')
    <div class=" card mx-auto mt-5 w-50 " style="height:600px">
        <div class="card-body container text-center" style="height: 50%">
            <h5 class="card-title">{{ $sewas->lapangan->nama }}</h5>
            <p class="card-text"><b>Nama Penyewa : {{ $sewas->nama_penyewa }}</b>
                <br>
                Tanggal Sewa : {{ $sewas->tanggal }}
                <br>
                Jam Mulai : {{ $sewas->jam_mulai }}
                <br>
                Jam Selesai : {{ $sewas->jam_selesai }}
                <br>
                <br>
                Total Biaya Sewa : Rp. {{ $sewas->biayatotal }}
            </p>
        </div>
    </div>
@endsection
