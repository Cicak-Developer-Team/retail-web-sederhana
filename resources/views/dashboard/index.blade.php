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
                    <a href="/dashboard" class="btn btn-light">Dashboard</a>
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
                <div class="col-md-3 p-2 rounded shadow">
                    <form class="">
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
                            <textarea name="deskipsi" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

@endSection
