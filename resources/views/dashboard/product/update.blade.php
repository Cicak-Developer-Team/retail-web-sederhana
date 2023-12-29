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

        <div class="col-md-12 p-0 m-0">
            <div class="row" style="justify-content: center; width: 100%;">
                <div class="col-md-8 p-2">
                    <div class="card shadow">
                        <div class="card-header">
                            <a href="/dashboard/product" class="btn btn-sm btn-primary mb-3">
                                <i class="bi bi-chevron-left"></i>
                                <span>Kembali</span>
                            </a>
                            <h3>{{ $product->nama }}</h3>
                        </div>
                        <div class="card-body">
                            {{-- ubah data --}}
                            <form action="{{ route("update_product") }}" method="post">
                                @csrf
                                <input type="text" name="id" hidden value="{{ $product->id }}" hidden>
                                <div class="mb-3">
                                    <label class="form-label">Category ID</label>
                                    <select name="category_id" class="form-select">
                                        <option value="{{ $product->category->id }}">{{ $product->category->nama }}</option>
                                        @foreach( $categories as $row )
                                            <option value="{{ $row->id }}">{{$row->id . " - " . $row->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $product->nama }}" placeholder="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">quantity</label>
                                    <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control" placeholder="quantity">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Expired Product</label>
                                    <input type="date" name="expired_product" value="{{ $product->expired_product }}" class="form-control" placeholder="quantity">
                                    <div>
                                        <small>Nilai Sekarang : {{ $product->expired_product }}</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">harga</label>
                                    <input type="text" name="harga" value="{{ $product->harga }}" class="form-control" placeholder="harga">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">deskripsi</label>
                                    <textarea name="deskripsi" class="form-control">{{ $product->deskripsi }}</textarea>
                                </div>
                                <div class="mb-3 text-end">
                                    <button class="btn btn-sm btn-success">
                                        <i class="bi bi-send"></i>
                                        <span>SUBMIT</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endSection
