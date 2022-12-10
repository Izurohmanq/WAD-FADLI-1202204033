@extends("layout.index")


@section("container")

<section id="add">
    <h2>Tambah mobil</h2>
    <p>Tambah Mobil Baru Anda Ke List Show Room</p>

    <form action="/showroom" method="post" class="w-75" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Mobil</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="owner" class="form-label">Nama Pemilik</label>
            <input type="text" class="form-control" id="owner" name="owner">
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Nama Merk</label>
            <input type="text" class="form-control" id="brand" name="brand">
        </div>
        <div class="mb-3">
            <label for="created_at" class="form-label">Tanggal Beli</label>
            <input type="date" class="form-control" id="created_at" name="created_at">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status Pembayaran</label>
            <br>
            <div class="d-flex flex-row">
                <input type="radio" id="Lunas" name="status" value="Lunas">
                <label for="Lunas" class="me-4">Lunas</label><br>
                <input type="radio" id="Belum" name="status" value="Belum Lunas">
                <label for="Belum">Belum Lunas</label><br>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary py-2 px-4 mb-4 btn-primary">Selesai</button>
    </form>
</section>

@endsection