@extends("layout/index")

@section("container")
<div class="mt-5 d-flex justify-content-center align-items-center">
    <div class="word flex">
        <h1><b>Selamat Datang Di Show Room Fadli</b></h1>
        <p>Show Roomnya Fadli nih bosss senggol dongg </p>
        @auth
        <a href="/showroom"><button type="button" class="btn btn-primary py-2 px-4 mb-4 btn-primary">My Car</button></a>
        @else
        <a href="/login"><button type="button" class="btn btn-primary py-2 px-4 mb-4 btn-primary">My Car</button></a>
        @endauth
        <div class="eadNama d-flex flex-row">
            <img src="{{url('/image/logo-ead.png')}}" class="me-3 w-25" alt="logo EAD">
            <p>FADLI_1202204033</p>
        </div>
    </div>
    <div class="gambarMobil">
        <img src="{{url('/image/gambar2.png')}}" alt="gambarHome">
    </div>
</div>
@endsection