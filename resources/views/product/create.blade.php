@extends('layout.app')
@section('content')

<h1 class="h3 mb-3 text-gray-800">Tambah Data Produk <a href="{{ route('product.index') }}" class="btn btn-primary">
    <div class=""></div> Lihat Data Produk
</a></h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </ul>
    </div>
@endif

<div class="card o-hidden border-0 shadow-lg">
    <div class="card-body p-0">
        <div>
            <div class="p-5">
                <form class="user" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kategori">Kategori produk</label>
                        <input type="text" class="form-control form-control-user" id="kategori" name="kategori"
                            placeholder="Kategori Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="produk">Produk</label>
                        <input type="text" class="form-control form-control-user" id="produk" , name="produk"
                            placeholder="Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control form-control-user" id="harga" , name="harga"
                            placeholder="Harga" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail" class="form-label">Upload Gambar</label>
                        <input class="form-control" type="file" id="thumbnail" name="thumbnail" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Tambah Data Produk
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection