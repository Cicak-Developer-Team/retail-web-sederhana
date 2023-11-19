@extends('templates.template')

@section('title', "Login Page")
@section('content')
<style>
    label {
        text-transform: capitalize;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3 bg-light rounded shadow" style="justify-content: space-evenly;">
            <div class="menu row py-2">
                <div class="col-md">
                    <a href="/dashboard" class="btn btn-primary text-white">Dashboard</a>
                    <a href="/dashboard/category" class="btn btn-light">Category</a>
                    <a href="/dashboard/history" class="btn btn-light">History</a>
                </div>
                <div class="col-md-2 text-end">
                    <a href="/logout" class="btn btn-danger">
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                {{-- sidebar --}}
                <div class="col-md-3 rounded shadow me-3">
                    {{-- tambah data --}}
                    <form action="{{ route("add_product") }}" method="post">
                        @csrf
                        <h4>Tambah Prduk</h4>
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
                            <input type="text" name="nama" class="form-control" placeholder="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="quantity">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">harga</label>
                            <input type="text" name="harga" class="form-control" placeholder="harga">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">deskripsi</label>
                            <textarea name="deskripsi" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success">
                                SUBMIT
                            </button>
                        </div>
                    </form>

                    {{-- ubah data --}}
                    <form action="{{ route("update_product") }}" method="post">
                        @csrf
                        <h4>Ubah Prduk</h4>
                        <div class="mb-3">
                            <label class="form-label">Data ID</label>
                            <select name="id" class="form-select">
                                <option value="">---</option>
                                @foreach( $products as $row )
                                    <option value="{{ $row->id }}">{{$row->id . " - " . $row->nama}}</option>
                                @endforeach
                            </select>
                        </div>
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
                            <input type="text" name="nama" class="form-control" placeholder="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="quantity">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">harga</label>
                            <input type="text" name="harga" class="form-control" placeholder="harga">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">deskripsi</label>
                            <textarea name="deskripsi" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-warning">
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>  

                <div class="col-md rounded shadow p-2">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>NAMA</th>
                                <th>QTY</th>
                                <th>KATEGORI</th>
                                <th>HARGA</th>
                                <th>DESKRIPSI</th>
                                <th></th>
                            </tr>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->category->nama }}</td>
                                    <td>Rp. {{ number_format($item->harga, 0) }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>
                                        <a href="{{ route("remove_product", $item->id) }}" class="btn btn-sm btn-danger">Hapus</a>
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

@endSection
