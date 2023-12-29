@extends('templates.template')

@section('title', "Dashboard Page")
@section('content')
<style>
    label {
        text-transform: capitalize;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3 bg-light rounded shadow" style="justify-content: space-evenly;">
            @include('components.navbar')
        </div>

        <div class="col-md-12">
            <div class="row justify-content-center">

                <div class="col-md-7 rounded shadow p-2">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                        Tambah Data
                    </button>                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>NAMA</th>
                                <th>QTY</th>
                                <th>KATEGORI</th>
                                <th>HARGA</th>
                                <th></th>
                            </tr>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->category->nama }}</td>
                                    <td>
                                        @if ( $item->diskon !== null )
                                            <div><del>Rp. {{ number_format($item->harga, 0) }}</del></div>
                                            <div>Rp. {{ number_format(diskonCount($item->harga, $item->diskon->diskon), 0) }}</div>
                                            @else
                                                <div>Rp. {{ number_format($item->harga, 0) }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route("update_product_view", $item->id) }}" class="btn btn-sm btn-success">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route("show_product", $item->id) }}" class="dtailP-btn btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route("remove_product", $item->id) }}" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

{{-- modal tambah data --}}
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahDataModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- tambah data --}}
                <form action="{{ route("add_product") }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category ID</label>
                        <select name="category_id" class="form-select">
                            <option value="">---</option>
                            @foreach( $categories as $row )
                                <option value="{{ $row->id }}">{{$row->id . " - " . $row->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">nama</label>
                        <input type="text" required name="nama" class="form-control" placeholder="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">quantity</label>
                        <input type="number" required name="quantity" class="form-control" placeholder="quantity">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">harga</label>
                        <input type="text" required name="harga" class="form-control" placeholder="harga">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">deskripsi</label>
                        <textarea name="deskripsi" required class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">
                            SUBMIT
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endSection