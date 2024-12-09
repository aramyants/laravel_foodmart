@extends('layouts.app')

@section('content')
<section class="py-5 mb-5" style="background: url(images/background-pattern.jpg);">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h1 class="page-title pb-2">Login</h1>
            <nav class="breadcrumb fs-6">
                <a class="breadcrumb-item nav-link" href="#">Home</a>
                <a class="breadcrumb-item nav-link" href="#">Pages</a>
                <span class="breadcrumb-item active" aria-current="page">Checkout</span>
            </nav>
        </div>
    </div>
    <div class="container-sm">
        <div class="row justify-content-center">
            <div class="col-lg-4 p-5 bg-white border shadow-sm">
                <h5 class="text-uppercase mb-4">Login</h5>
                <!-- Display Login Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="form" class="form-group flex-wrap" action="/login" method="POST">
                    @csrf
                    <div class="col-12 pb-3">
                        <label class="d-none">Email *</label>
                        <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-12 pb-3">
                        <label class="d-none">Password *</label>
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary text-uppercase w-100">Log in</button>
                        <a href="/register" class="d-block text-center mt-2">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
