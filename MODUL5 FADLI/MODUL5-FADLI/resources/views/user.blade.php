@extends("layout/index")

@section("container")

<section id="profilee">
    <div class="form text-center mt-5">
        <h1 class="mb-4">Profile</h1>
        <div class="form2 justify-content-center">
            <form action="/user/{{ auth()->user()->id }}" method="post">
                @csrf
                @method("PUT")
                <div class="row mb-3">
                    <div class="col-4"><label for="email">Email</label></div>
                    <div class="col-7"><input type="email" name="email" id="email" class="w-100"
                            value="{{ auth()->user()->email }}" disabled></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><label for="name">Nama</label></div>
                    <div class="col-7"><input type="name" name="name" id="name" class="w-100"
                            value=" {{ auth()->user()->name }} "></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><label for="no_hp" class="form-label">Nomor Handphone</label></div>
                    <div class="col-7"><input type="text" name="no_hp" id="no_hp" class="w-100"
                            value="{{ auth()->user()->no_hp }}"></div>
                </div>

                <hr class="w-75 mx-auto" /> <!-- batas garis antara bawah dan atas -->

                <div class="row mb-3">
                    <div class="col-4"><label for="password" class="form-label">Password</label></div>
                    <div class="col-7"><input type="password" name="password" id="password" class="form-control w-100">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><label for="cPassword" class="form-label">Konfirmasi Password</label></div>
                    <div class="col-7"><input type="password" name="cPassword" id="cPassword"
                            class="form-control w-100"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><label for="warnaNavbar" class="form-label">Warna Navbar</label></div>
                    <div class="col-7">
                        <select class="form-select text-muted" aria-label="Warna Navbar" id="warnaNavbar"
                            name="warnaNavbar">
                            @foreach($warnaNavbar as $warna => $value)
                            <option value="{{ $warna; }}" {{ $warna === $getWarna ? 'selected' : '' }}>{{ $value; }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" name="update">Update gan</button>
            </form>
        </div>
    </div>
</section>
@endsection