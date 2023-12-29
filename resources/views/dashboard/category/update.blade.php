@extends('templates.template')

@section('title', "Category Page")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3 bg-light rounded shadow" style="justify-content: space-evenly;">
            @include('components.navbar')
        </div>
        
        <!-- sidebar -->
        <div class="col-md-12">
            <div class="row justify-content-center gap-3">
                <div class="col-md-7 p-2">
                    <div class="card shadow">
                        <div class="card-header">
                            <a href="/dashboard/category" class="btn btn-sm btn-primary">
                                <i class="bi bi-chevron-left"></i>
                                <span>Kembali</span>
                            </a>
                            <h4>Ubah Category</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update_category') }}" method="post">
                                @csrf
                                <input type="text" name="id" value="{{ $data->id }}">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ $data->nama }}" name="nama" placeholder="nama">
                                </div>
                                <button class="btn btn-warning">
                                    SUBMIT
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endSection
