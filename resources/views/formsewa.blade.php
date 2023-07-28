@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')
    <div class="container-sm my-5">
        <form action="{{ route('formsewa.store') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <h4>Form Sewa</h4>
                    </div>
                    <div class="mb-3">
                        <label for="namaPenyewa" class="form-label">Nama Penyewa</label>
                        <input type="text" class="form-control @error('namaPenyewa')
            is-invalid @enderror"
                            id="namaPenyewa" name="namaPenyewa" placeholder="Nama penyewa">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal')
            is-invalid @enderror"
                            id="tanggal" name="tanggal" />
                    </div>
                    <div class="mb-3" style="">
                        <label for="jamMulai" class="form-label">Jam Mulai</label>
                        <input class="form-control @error('jamMulai')
            is-invalid @enderror" type="time"
                            id="jamMulai" name="jamMulai" step="3600" value="13:00" min="12:00" max="23:00"
                            onchange="timeFunction()" />
                    </div>
                    <div class="mb-3" style="">
                        <label for="jamSelesai" class="form-label">Jam Selesai</label>
                        <input class="form-control @error('jamSelesai')
            is-invalid @enderror" type="time"
                            id="jamSelesai" name="jamSelesai" step="3600" value="14:00" min="12:00" max="23:00"
                            onchange="timeFunction()" />
                    </div>
                    <div class="mb-3" style="">
                        <label for="biayaTotal" class="form-label">Biaya</label>
                        <input class="form-control" type="number" id="biayaTotal" name="biayaTotal" value=""
                            readonly />
                        <input class="form-control" type="hidden" value="{{ $lapangan->biayasewa }}" id="biayaSewa">
                        <input class="form-control" type="hidden" value="{{ $lapangan->id }}" id="lapanganId"
                            name="lapanganId">
                        <input class="form-control" type="hidden" value="0" id="acc" name="acc">
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('admin.index') }}" class="btn
            btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i>
                                Batal</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg
            mt-3"><i
                                    class="bi-check-circle me-2"></i> Sewa</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        const jm_mulai = document.getElementById('jamMulai');
        const jm_selesai = document.getElementById('jamSelesai');

        jamMulai.addEventListener('input', (e) => {
            let hour = e.target.value.split(':')[0]
            e.target.value = `${hour}:00`
        });

        jamSelesai.addEventListener('input', (e) => {
            let hour = e.target.value.split(':')[0]
            e.target.value = `${hour}:00`
        });

        const getminutes = s => s.split(":").reduce((acc, curr) => acc * 60 + +curr, 0);
        var minutes1 = getminutes(document.getElementById("jamMulai").value);
        var minutes2 = getminutes(document.getElementById("jamSelesai").value);

        var res = Math.abs(minutes2 - minutes1);

        var hours = Math.floor(res / 60);
        document.getElementById("biayaTotal").value = hours * document.getElementById("biayaSewa").value

        function timeFunction() {
            var minutes1 = getminutes(document.getElementById("jamMulai").value);
            var minutes2 = getminutes(document.getElementById("jamSelesai").value);

            var res = Math.abs(minutes2 - minutes1);

            var hours = Math.floor(res / 60);
            document.getElementById("biayaTotal").value = hours * document.getElementById("biayaSewa").value
        }
    </script>
@endsection
