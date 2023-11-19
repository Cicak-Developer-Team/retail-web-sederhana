@extends('templates.template')

@section('title', "Category Page")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3 bg-light rounded shadow">
            <div class="menu row py-2"  style="justify-content: space-evenly;">
                <div class="col-md">
                    <a href="/dashboard" class="btn btn-light">Dashboard</a>
                    <a href="/dashboard/category" disabled class="btn text-white bg-primary">Category</a>
                    <a href="/dashboard/history" class="btn btn-light">History</a>
                </div>
                <div class="col-md-2 text-end">
                    <a href="/logout" class="btn btn-danger">
                        Logout
                    </a>
                </div>
            </div>
        </div>
        
        <!-- sidebar -->
        <div class="col-md-12">
            <div class="row gap-3">
                <div class="col-md-3 shadow p-2">
                    <div class="sidebar">
                        <!-- add -->
                        <form action="{{ route('add_category') }}" method="post" class="mb-3">
                            <h4>Tambah Category</h1>
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <button class="btn btn-success">
                                SUBMIT
                            </button>
                        </form>

                        <!-- remove -->
                        <form action="{{ route('update_category') }}" method="post">
                            <h4>Ubah Category</h1>
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Category ID</label>
                                <select name="id" class="form-select">
                                    <option value="">---</option>
                                    @foreach( $data as $row )
                                        <option value="{{ $row->id }}">{{$row->id . " - " . $row->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="nama">
                            </div>
                            <button class="btn btn-warning">
                                SUBMIT
                            </button>
                        </form>
                    </div>
                </div>
    
                <div class="col-md shadow p-2">
                    <div class="content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>NAMA</th>
                                    <th></th>
                                </tr>
                                @foreach( $data as $row )
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td style="width: 80px;">
                                            <a href="{{ route('remove_category', $row->id) }}" class="btn btn-sm btn-danger">Hapus</button>
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
</div>

@endSection
