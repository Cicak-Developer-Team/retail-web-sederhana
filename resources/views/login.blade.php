@extends('templates.template')

@section('title', "Login Page")
@section('content')
    <div 
        class="container row align-items-center justify-content-center" 
        style="height: 100vh; width: 100vw;"
    >
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="display-6">Login Page</h1>
                </div>
                <form action="{{ route('auth') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input name="name" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">
                            LOGIN
                        </button>
                    </div>
                </form>
            </div>
        </div>    
    </div>
@endSection
