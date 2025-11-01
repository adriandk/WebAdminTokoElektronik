@extends('layout.app')
@section('styles')

<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Data Produk Kamu <a href="{{ route('product.create') }}" class="btn btn-primary">
        <div class=""></div> Tambah Data Produk
    </a></h1>

@if (session('success'))
<div class="alert alert-success">
    <ul>
        {{ session('success') }}
    </ul>
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Kategori</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Kategori</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ( $products as $product )
                    <tr>
                        <td>
                            @if($product->thumbnail)
                            <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="Image" width="100"
                                height="100" class="img-thumbnail">
                            @else
                            <div class="d-flex justify-content-center align-items-center bg-light"
                                style="width: 100px; height: 100px;">
                                <i class="fa-solid fa-image fa-2x text-muted"></i>
                            </div>
                            @endif
                        </td>
                        <td>{{ $product->kategori ?? "" }}</td>
                        <td>{{ $product->produk ?? "" }}</td>
                        <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada Produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection