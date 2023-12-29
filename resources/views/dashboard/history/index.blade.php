@extends('templates.template')

@section('title', "History Page")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3 bg-light rounded shadow" style="justify-content: space-evenly;">
            @include('components.navbar')
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
