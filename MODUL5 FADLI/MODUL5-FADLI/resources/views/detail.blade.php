@extends("layout.index")

@section("container")

<section id="Detail" class="mb-5">
    <div class="judul-atas" style="margin: 50px 0 0 120px;">
        <h1 class="fw-bold">{{ $showroom["name"] }}</h1>
        <p> Detail Mobil {{ $showroom["name"] }}</p>
    </div>

    <div class="isian d-flex justify-content-center mt-5">

        <div class="col">
            <div class="row">
                <img class="pe-5 w-75 h-75 mx-auto" src="{{ asset('storage/image/' . $showroom['image']) }}"
                    alt="gambar">
            </div>
        </div>
        <div class="col">
            <div class="row">
                <form action="" class=" w-75" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $showroom['name'] }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="owner" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" id="owner" name="owner" value="{{ $showroom['owner'] }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Nama merek</label>
                        <input type="text" class="form-control" id="brand" name="brand" value="{{ $showroom['brand'] }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Tanggal Beli</label>
                        <input type="date" class="form-control" id="created_at" name="created_at"
                            value="{{ $showroom['created_at'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                            readonly> {{ $showroom["description"];}} </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*"
                            placeholder="{{ $showroom['image']}}" value="{{ $showroom['image']}}" readonly>
                        <span>{{ $showroom['image'] }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Pembayaran</label>
                        <br>
                        <div class="d-flex flex-row">
                            <label for="Lunas" class="me-4"><input type="radio" id="Lunas" name="status" value="Lunas"
                                    {{ $showroom["status"] === "Lunas" ? "checked" : "disabled"  }}>Lunas</label><br>
                            <label for="Belum Lunas" class="me-4"><input type="radio" id="Belum Lunas" name="status"
                                    value="Belum Lunas"
                                    {{ $showroom["status"] === "Belum-Lunas" ? "checked" : "disabled"  }}>Belum
                                Lunas</label><br>
                        </div>
                    </div>
                </form>
                <a href="/showroom/{{ $showroom['id'] }}/edit"><button
                        class="btn btn-primary px-3 py-2">Edit</button></a>
            </div>
        </div>

    </div>
</section>

@endsection