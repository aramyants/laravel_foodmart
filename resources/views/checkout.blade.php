@extends('layouts.app')

@section('content')
    <section class="py-5 mb-5" style="background: url(images/background-pattern.jpg);">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <h1 class="page-title pb-2">Checkout</h1>
                <nav class="breadcrumb fs-6">
                    <a class="breadcrumb-item nav-link" href="#">Home</a>
                    <a class="breadcrumb-item nav-link" href="#">Pages</a>
                    <span class="breadcrumb-item active" aria-current="page">Checkout</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="shopify-cart checkout-wrap py-5">
        <div class="container-fluid">
            <form action="{{ url('/pay') }}" method="POST" class="form-group">
                @csrf
                <div class="row d-flex flex-wrap">
                    <div class="col-lg-6">
                        <h4 class="text-dark pb-4">Billing Details</h4>
                        <div class="billing-details">
                            <label for="cname">Company Name (optional)*</label>
                            <input type="text" id="cname" name="company_name" class="form-control mt-2 mb-4" value="{{ old('company_name') }}">
                            @error('company_name')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror

                            <label for="cname">Country / Region*</label>
                            <select class="form-select form-control mt-2 mb-4" aria-label="Default select example" name="country_region">
                                <option value="United States" {{ old('country_region') == 'United States' ? 'selected' : '' }}>United States</option>
                                <option value="1" {{ old('country_region') == '1' ? 'selected' : '' }}>UK</option>
                                <option value="2" {{ old('country_region') == '2' ? 'selected' : '' }}>Australia</option>
                                <option value="3" {{ old('country_region') == '3' ? 'selected' : '' }}>Canada</option>
                            </select>
                            @error('country_region')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror

                            <label for="address">Street Address*</label>
                            <input type="text" id="adr" name="street_address" placeholder="House number and street name" class="form-control mt-3 ps-3 mb-3" value="{{ old('street_address') }}">
                            @error('street_address')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror

                            <input type="text" id="adr" name="apartment_suite" placeholder="Apartments, suite, etc." class="form-control ps-3 mb-4" value="{{ old('apartment_suite') }}">
                            @error('apartment_suite')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror

                            <label for="city">Town / City *</label>
                            <input type="text" id="city" name="town_city" class="form-control mt-3 ps-3 mb-4" value="{{ old('town_city') }}">
                            @error('town_city')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror

                            <label for="state">State *</label>
                            <select class="form-select form-control mt-2 mb-4" aria-label="Default select example" name="state">
                                <option value="Florida" {{ old('state') == 'Florida' ? 'selected' : '' }}>Florida</option>
                                <option value="1" {{ old('state') == '1' ? 'selected' : '' }}>New York</option>
                                <option value="2" {{ old('state') == '2' ? 'selected' : '' }}>Chicago</option>
                                <option value="3" {{ old('state') == '3' ? 'selected' : '' }}>Texas</option>
                                <option value="4" {{ old('state') == '4' ? 'selected' : '' }}>San Jose</option>
                                <option value="5" {{ old('state') == '5' ? 'selected' : '' }}>Houston</option>
                            </select>
                            @error('state')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror

                            <label for="zip">Zip Code *</label>
                            <input type="text" id="zip" name="zip_code" class="form-control mt-2 mb-4 ps-3" value="{{ old('zip_code') }}">
                            @error('zip_code')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h4 class="text-dark pb-4">Additional Information</h4>
                        <div class="billing-details">
                            <label for="fname">Order notes (optional)</label>
                            <textarea class="form-control pt-3 pb-3 ps-3 mt-2" placeholder="Notes about your order. Like special notes for delivery.">{{ old('order_notes') }}</textarea>
                            @error('order_notes')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="your-order mt-5">
                            <h4 class="display-7 text-dark pb-4">Cart Totals</h4>
                            <div class="total-price">
                                <table cellspacing="0" class="table">
                                    <tbody>
                                        <tr class="subtotal border-top border-bottom pt-2 pb-2 text-uppercase">
                                            <th>Subtotal</th>
                                            <td data-title="Subtotal">
                                                <span class="price-amount amount ps-5">
                                                    <bdi>
                                                        <span class="price-currency-symbol">$</span>{{$total}} </bdi>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="order-total border-bottom pt-2 pb-2 text-uppercase">
                                            <th>Total</th>
                                            <td data-title="Total">
                                                <span class="price-amount amount ps-5">
                                                    <bdi>
                                                        <span class="price-currency-symbol">$</span>{{$total}}</bdi>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="list-group mt-5 mb-3">
                                    <label class="list-group-item d-flex gap-2 border-0">
                                        <input class="form-check-input flex-shrink-0" type="radio" name="payment_method" value="bank_transfer">
                                        <span>
                                            <strong class="text-uppercase">Direct bank transfer</strong>
                                            <small class="d-block text-body-secondary">Make your payment directly into our bank account. Please use your Order ID. Your order will ship after funds have cleared.</small>
                                        </span>
                                    </label>

                                    <label class="list-group-item d-flex gap-2 border-0">
                                        <input class="form-check-input flex-shrink-0" type="radio" name="payment_method" value="check_payment">
                                        <span>
                                            <strong class="text-uppercase">Check payments</strong>
                                            <small class="d-block text-body-secondary">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</small>
                                        </span>
                                    </label>

                                    <label class="list-group-item d-flex gap-2 border-0">
                                        <input class="form-check-input flex-shrink-0" type="radio" name="payment_method" value="cash_on_delivery">
                                        <span>
                                            <strong class="text-uppercase">Cash on delivery</strong>
                                            <small class="d-block text-body-secondary">Pay with cash upon delivery.</small>
                                        </span>
                                    </label>

                                    <label class="list-group-item d-flex gap-2 border-0">
                                        <input class="form-check-input flex-shrink-0" type="radio" name="payment_method" value="paypal">
                                        <span>
                                            <strong class="text-uppercase">Paypal</strong>
                                            <small class="d-block text-body-secondary">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</small>
                                        </span>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-dark btn-lg text-uppercase btn-rounded-none w-100">Place an order</button>
                                @if(session('error'))
                                    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
