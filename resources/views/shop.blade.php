@extends('layouts.app')

@section('content')
    <section class="py-5 mb-5" style="background: url(images/background-pattern.jpg);">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <h1 class="page-title pb-2">{{isset($activeCategory) ? $activeCategory->name : 'Shop'}}</h1>
                <nav class="breadcrumb fs-6">
                    <a class="breadcrumb-item nav-link" href="#">Home</a>
                    <span class="breadcrumb-item active" aria-current="page">Shop</span>
                </nav>
            </div>
        </div>
    </section>

    <div class="shopify-grid">
        <div class="container-fluid">
            <div class="row g-5">
                <aside class="col-md-2">
                    <div class="sidebar">
                        <div class="widget-menu">
                            <div class="widget-search-bar">
                                <form role="search" method="get" class="d-flex position-relative">
                                    <form class="d-flex mt-3 gap-0" action="index.html">
                                        <input class="form-control form-control-lg rounded-2 bg-light" type="text" name="search" placeholder="Search here" aria-label="Search here"
                                        value="{{$search}}">
                                        <button class="btn bg-transparent position-absolute end-0" type="submit"><svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#search"></use></svg></button>
                                    </form>
                                </form>
                            </div>
                        </div>
                        <div class="widget-product-categories pt-5">
                            <h5 class="widget-title">Categories</h5>
                            <ul class="product-categories sidebar-list list-unstyled">
                                <li class="cat-item">
                                    <a href="/shop">All</a>
                                </li>
                                @foreach($categories as $category)
                                    <li class="cat-item">
                                        <a href="?category={{$category->id}}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- <div class="widget-product-tags pt-3">
                            <h5 class="widget-title">Tags</h5>
                            <ul class="product-tags sidebar-list list-unstyled">
                                <li class="tags-item">
                                    <a href="#" class="nav-link">White</a>
                                </li>
                                <li class="tags-item">
                                    <a href="#" class="nav-link">Cheap</a>
                                </li>
                                <li class="tags-item">
                                    <a href="#" class="nav-link">Mobile</a>
                                </li>
                                <li class="tags-item">
                                    <a href="#" class="nav-link">Modern</a>
                                </li>
                            </ul>
                        </div> -->
                        <div class="widget-product-brands pt-3">
                            <h5 class="widget-title">Brands</h5>
                            <ul class="product-tags sidebar-list list-unstyled">
                                @foreach($brands as $brand)
                                    <li class="cat-item">
                                        <a href="?brand={{$brand->id}}">{{$brand->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget-price-filter pt-3">
                            <h5 class="widget-titlewidget-title">Filter By Price</h5>
                            <ul class="product-tags sidebar-list list-unstyled">
                                <li class="tags-item">
                                    <a href="?maxPrice=10" class="nav-link">Less than $10</a>
                                </li>
                                <li class="tags-item">
                                    <a href="?minPrice=10&maxPrice=20" class="nav-link">$10- $20</a>
                                </li>
                                <li class="tags-item">
                                    <a href="?minPrice=20&maxPrice=30" class="nav-link">$20- $30</a>
                                </li>
                                <li class="tags-item">
                                    <a href="?minPrice=30&maxPrice=40" class="nav-link">$30- $40</a>
                                </li>
                                <li class="tags-item">
                                    <a href="?minPrice=40&maxPrice=50" class="nav-link">$40- $50</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>

                <main class="col-md-10">
                    <div class="filter-shop d-flex justify-content-between">
                        <div></div>
                        <div class="showing-product">
                            <p>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                        </div>
                        <!-- <div class="sort-by">
                            <select id="input-sort" class="form-control" data-filter-sort="" data-filter-order="">
                                <option value="">Default sorting</option>
                                <option value="">Name (A - Z)</option>
                                <option value="">Name (Z - A)</option>
                                <option value="">Price (Low-High)</option>
                                <option value="">Price (High-Low)</option>
                            </select>
                        </div> -->
                    </div>

                    <div class="product-grid row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

                        <div class="col">
                            @foreach ($products as $product)
                                <div class="product-item">
                                    <!-- <span class="badge bg-success position-absolute m-3">-30%</span> -->
                                    <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                                    <figure>
                                        <a href="/product/{{ $product->id }}" title="Product Title">
                                        <img src="storage/{{$product->image}}" alt="Product Thumbnail" class="tab-image">
                                        </a>
                                    </figure>
                                    <h3>{{$product->name}}</h3>
                                    <span class="qty">{{$product->quantity}} Unit</span>
                                    <span class="rating">
                                        <svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5
                                    </span>
                                    <span class="price">{{$product->price}}</span>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="input-group product-qty">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                                </button>
                                            </span>
                                            <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                                            <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                            </button>
                                        </span>
                                        </div>
                                        <a href="/product/{{$product->id}}/add-to-cart" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                    </div>
                    <!-- / product-grid -->

                    <nav class="text-center py-4" aria-label="Page navigation">
                        <ul class="pagination d-flex justify-content-center">
                            <!-- Previous Page Link -->
                            <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link bg-none border-0" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <!-- Page Number Links -->
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link border-0" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <!-- Next Page Link -->
                            <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link border-0" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </main>

            </div>
        </div>
    </div>

@endsection
