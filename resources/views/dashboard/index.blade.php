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
            <div class="menu row py-2">
                <div class="col-md">
                    <a href="/dashboard" class="btn btn-primary text-white">Dashboard</a>
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
