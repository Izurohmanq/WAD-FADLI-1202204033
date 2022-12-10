@extends("layout.index")

@section("container")

@if(session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<section id="list" style="margin:50px 0 0 120px;">
    <h1 class="fw-bold">My Show Room</h1>
    <p class="fw-light">List Show Room Fadli-1202204033</p>
    <div class="row">
        @foreach($showroom as $sh)
        <div class="col-md-4 mb-5">
            <div class="card" style="width: 350px;">
                <img src="{{ asset('storage/image/' . $sh['image']) }}" class="card-img-top p-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $sh["name"] }}</h5>
                    <p class="card-text">{{ Str::limit($sh["description"]) ;}}</p>
                    <div class="d-flex">
                        <a href="/showroom/{{ $sh['id'] }}" class="btn btn-primary rounded-5 me-2 px-5 py-2">Detail</a>
                        <form action="/showroom/{{ $sh['id'] }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-5 px-5 py-2"
                                onclick="return confirm('yakin gak nih?');">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="bawah my-5">
        <p>Jumlah mobil saat ini {{ $countShowroom }}</p>
    </div>
</section>
@endsection