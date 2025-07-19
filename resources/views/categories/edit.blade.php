
@section('content')
<h2>Edit Kategori</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label"><strong>Nama:</strong></label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Nama">
    </div>
    <div class="text-end">
         <a class="btn btn-secondary" href="{{ route('categories.index') }}"> Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
