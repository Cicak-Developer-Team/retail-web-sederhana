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
                            <div>
                                <span class="badge bg-primary text-white">{{ $product->category->nama }}</span>
                            </div>
                            <div>
                                Stok : {{ $product->quantity }}
                            </div>
                            <div class="mt-2">
                                <div class="d-flex" style="gap: 12px;">
                                    @if ( $product->diskon !== null )
                                        <h4 style="color: rgb(240, 65, 65)"><del>Rp {{ number_format($product->harga, 0) }}</del></h4>
                                        <h4>Rp {{ number_format(diskonCount($product->harga, $product->diskon->diskon), 0) }}</h4>
                                        @else
                                            <h4>Rp {{ number_format($product->harga, 0) }}</h4>
                                    @endif
                                </div>
                                <p class="py-3">{{ $product->deskripsi }}</p>
                            </div>
                            <div>
                                <a href="{{ route("beli_product", $product->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-cash"></i>
                                </a>
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#discountModal">
                                    <i class="bi bi-percent"></i>
                                    <span>Tambah Diskon</span>
                                </button>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

<!-- Modal Diskon -->
<div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("tambah_diskon") }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                    <input type="number" class="form-control mb-2" name="diskon" placeholder="Diskon %">
                    <input type="date" class="form-control mb-2" name="expired">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endSection