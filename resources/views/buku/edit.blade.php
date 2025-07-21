
@section('content')
<div class="container">
    <h1>{{ isset($buku) ? 'Edit Buku' : 'Tambah Buku' }}</h1>
    <form action="{{ isset($buku) ? route('buku.update', $buku) : route('buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($buku)) @method('PUT') @endif

        <div class="mb-3">
            <label>Kode Buku</label>
            <input type="text" name="kode_buku" value="{{ old('kode_buku', $buku->kode_buku ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $buku->judul ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto Buku</label>
            <input type="file" name="foto" class="form-control">
            @if(isset($buku) && $buku->foto)
                <img src="{{ asset('storage/'.$buku->foto) }}" class="mt-2" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-success">{{ isset($buku) ? 'Update' : 'Simpan' }}</button>
    </form>
</div>
