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
                    <h5 class="text-uppercase mb-4">Register</h5>
                    <form id="form" class="form-group flex-wrap" action="/register" method="POST">
                        @csrf
                        <div class="col-12 pb-3">
                            <label class="d-none">First Name</label>
                            <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 pb-3">
                            <label class="d-none">Last Name</label>
                            <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 pb-3">
                            <label class="d-none">Email</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 pb-3">
                            <label class="d-none">Password *</label>
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                            @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 pb-3">
                            <label class="d-none">Confirm Password *</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
                            @error('password_confirmation')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary text-uppercase w-100">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
