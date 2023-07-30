@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')
    <div class="container text-center">
        <h2>Admin Lapangan</h2>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">TAMBAH LAPANGAN</a>
    </div>
    @foreach ($lapangans as $lapangan)
        <div class="card mx-auto mt-4 w-50 " style="height:400px">
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
                <div class="d-flex gap-3">
                    <a href="{{ route('admin.edit', ['admin' => $lapangan->id]) }}" class="btn btn-primary">EDIT</a>

                    <form class="" action="{{ route('admin.destroy', ['admin' => $lapangan->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-delete confirm" id="btn-delete">DELETE</button>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('scripts')
            <script type="module">
        //the confirm class that is being used in the delete button
        $('.confirm').click(function(event) {

        //This will choose the closest form to the button
        var form =  $(this).closest("form");

        //don't let the form submit yet
        event.preventDefault();

        //configure sweetalert alert as you wish
        Swal.fire({
            title: 'Hapus Data',
            text: "Yakin ingin menghapus data?",
            cancelButtonText: "Tidak",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin!'
        }).then((result) => {

            //in case of deletion confirm then make the form submit
            if (result.isConfirmed) {
                form.submit();
            }
        })
        });
        </script>
@endpush
