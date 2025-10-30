@extends('layout.app')
@section('content')

<h1 class="h3 mb-3 text-gray-800">Edit Data Produk <a href="{{ route('product.index') }}" class="btn btn-primary">
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
                <form class="user" action="{{ route('product.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kategori">Kategori produk</label>
                        <input type="text" class="form-control form-control-user" id="kategori" name="kategori"
                            placeholder="Kategori Produk" required value="{{ old('kategori', $product->kategori) }}">
                    </div>
                    <div class="form-group">
                        <label for="produk">Produk</label>
                        <input type="text" class="form-control form-control-user" id="produk" name="produk"
                            placeholder="Produk" required value="{{ old('produk', $product->produk) }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control form-control-user" id="harga" name="harga"
                            placeholder="Harga" required value="{{ old('harga', $product->harga) }}">
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            @if ($product->thumbnail)
                            <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="Image" width="100"
                                height="100" class="img-thumbnail">
                            @else
                            <div class="d-flex justify-content-center align-items-center bg-light"
                                style="width: 100px; height: 100px;">
                                <i class="fa-solid fa-image fa-2x text-muted"></i>
                            </div>
                            @endif
                        </div>

                        <label for="thumbnail">Upload Gambar</label>
                        <input class="form-control" type="file" id="thumbnail" name="thumbnail" accept="image/*">
                        <small class="form-text text-muted">Format yang didukung: JPG dan PNG</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Update Data Produk
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection