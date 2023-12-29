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
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h1>Welcome to {{ env("APP_NAME") }}</h1>
                </div>
            </div>
            @if( $product !== null )
                <div class="row">
                    <div class="col-md-4">
                        <h3>Produk paling banyak dibeli</h3>
                        <div class="card shadow">
                            <div class="card-body">
                                <h4>{{ $product->nama }}</h4>
                                <p>{{ $product->deskripsi }}</p>
                                <a href="{{ route("show_product", $product->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    
    </div>
</div>

@endSection
