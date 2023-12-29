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
            <div class="row">
                <div class="card shadow">
                    <div class="card-body">
                        <h1>Welcome to {{ env("APP_NAME") }}</h1>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

@endSection
