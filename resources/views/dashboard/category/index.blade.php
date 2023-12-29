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
            <div class="row gap-3 justify-content-center">

                <div class="col-md-7 shadow p-2">
                    <div class="content">                        
                        <button type="button" class="btn btn-primary my-2 btn-sm" data-bs-toggle="modal" data-bs-target="#TambahCategory">
                            <i class="bi bi-plus"></i>
                            <span>Tambah Kategori</span>
                        </button>
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
                                        <td>
                                            <div class="text-end">
                                                <a href="{{ route('remove_category', $row->id) }}" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                                <a href="{{ route("update_category_view", $row->id) }}" class="btn btn-sm btn-success">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </div>
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

<!-- Modal -->
<div class="modal fade" id="TambahCategory" tabindex="-1" aria-labelledby="TambahCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="TambahCategoryLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- add -->
                <form action="{{ route('add_category') }}" method="post" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <button class="btn btn-success">
                        SUBMIT
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endSection
