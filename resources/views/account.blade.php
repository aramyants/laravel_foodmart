@extends('layouts.app')

@section('content')
    <section class="py-5 mb-5" style="background: url(images/background-pattern.jpg);">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <h1 class="page-title pb-2">Account</h1>
                <nav class="breadcrumb fs-6">
                    <a class="breadcrumb-item nav-link" href="#">Home</a>
                    <a class="breadcrumb-item nav-link" href="#">Dashboard</a>
                    <span class="breadcrumb-item active" aria-current="page">Account</span>
                </nav>
            </div>
        </div>
        <div class="container-sm">
            <div class="row justify-content-center">
                <div class="col-lg-4 p-5 bg-white border shadow-sm">
                    <h5 class="text-uppercase mb-4">Welcome, {{ $customer->first_name }} {{ $customer->last_name }}!</h5>
                </div>
            </div>
        </div>
    </section>
@endsection
