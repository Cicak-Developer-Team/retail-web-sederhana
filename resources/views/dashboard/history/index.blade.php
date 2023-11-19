@extends('templates.template')

@section('title', "History Page")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3 bg-light rounded shadow" style="justify-content: space-evenly;">
            <div class="menu row py-2">
                <div class="col-md">
                    <a href="/dashboard" class="btn btn-light">Dashboard</a>
                    <a href="/dashboard/category" class="btn btn-light">Category</a>
                    <a href="/dashboard/history" class="btn btn-primary text-white">History</a>
                </div>
                <div class="col-md-2 text-end">
                    <a href="/logout" class="btn btn-danger">
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-12 rounded shadow p-2">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>MESSAGE</th>
                        <th>CREATED</th>
                    </tr>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->text }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                    <tr>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endSection
