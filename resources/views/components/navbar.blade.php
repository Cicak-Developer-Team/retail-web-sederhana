@php
    $uri = Route::current()->uri;
    $resUri = explode("/", $uri);
    $current = end($resUri);
@endphp
<div class="menu row py-2">
    <div class="col-md">
        <a href="/dashboard" class="btn {{ ($current == 'dashboard') ? 'btn-primary text-white' : 'btn-lght' }}">Dashboard</a>
        <a href="/dashboard/product" class="btn {{ ($current == 'product') ? 'btn-primary text-white' : 'btn-lght' }}">product</a>
        <a href="/dashboard/category" class="btn {{ ($current == 'category') ? 'btn-primary text-white' : 'btn-lght' }}">category</a>
        <a href="/dashboard/history" class="btn {{ ($current == 'history') ? 'btn-primary text-white' : 'btn-lght' }}">history</a>
    </div>
    <div class="col-md-2 text-end">
        <a href="/logout" class="btn btn-danger">
            Logout
        </a>
    </div>
</div>