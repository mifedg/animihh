@extends('layouts.main')

@section('title','Home')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/checkout.css">
    <link rel="stylesheet" type="text/css" href="/styles/checkout_responsive.css">
@endsection

@section('custom_js')
    <script src="/js/checkout.js"></script>
@endsection
@section('content')

    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(images/cart.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li>Checkout</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout -->

    <div class="checkout">
        <div class="container">
            <div class="row">

                <!-- Billing Info -->
                <div class="col-lg-6">
                    <div class="billing checkout_section">
                        <div class="section_title">Billing Address</div>
                        <div class="section_subtitle">Enter your address info</div>
                        <div class="checkout_form_container">
                            <form action="{{route('makeOrder')}}" method="POST" id="checkout_form" class="checkout_form">
                                    @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">First Name*</label>
                                        <input name ="checkout_name" type="text" value="{{$user->name}}" id="checkout_name" class="checkout_input" required="required">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Last Name*</label>
                                        <input name ="checkout_last_name" type="text" id="checkout_last_name" class="checkout_input" required="required">
                                    </div>
                                </div>


                                <div>
                                    <!-- Address -->
                                    <label for="checkout_address">Address*</label>
                                    <input name ="checkout_address" type="text" id="checkout_address" class="checkout_input" required="required">
                                </div>
                                <div>
                                    <!-- Zipcode -->
                                    <label for="checkout_zipcode">Zipcode*</label>
                                    <input name ="checkout_zipcode" type="text" id="checkout_zipcode" class="checkout_input" required="required">
                                </div>
                                <div>
                                    <!-- City / Town -->
                                    <label for="checkout_city">City/Town*</label>
                                    <select name="checkout_city" id="checkout_city" class="dropdown_item_select checkout_input" require="required">
                                        <option></option>
                                        <option>City</option>
                                        <option>City</option>
                                        <option>City</option>
                                        <option>City</option>
                                    </select>
                                </div>
                                <div>
                                    <!-- Phone no -->
                                    <label>Phone no*</label>
                                    <input name ="phone" type="phone" id="checkout_phone" class="checkout_input" required="required">
                                </div>
                                <div>
                                    <!-- Email -->
                                    <label for="checkout_email">Email Address*</label>
                                    <input name ="checkout_email" type="phone" value = "{{$user->email}}" id="checkout_email" class="checkout_input" required="required">
                                </div>
                                <div class="checkout_extra">
                                    <div>
                                        <input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
                                        <label for="checkbox_terms"><img src="images/check.png" alt=""></label>
                                        <span class="checkbox_title">Terms and conditions</span>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="checkbox_account" name="regular_checkbox" class="regular_checkbox">
                                        <label for="checkbox_account"><img src="images/check.png" alt=""></label>
                                        <span class="checkbox_title">Create an account</span>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="checkbox_newsletter" name="regular_checkbox" class="regular_checkbox">
                                        <label for="checkbox_newsletter"><img src="images/check.png" alt=""></label>
                                        <span class="checkbox_title">Subscribe to our newsletter</span>
                                    </div>
                                    <div>
                                        <button class="order_button" type="submit">Place Order</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Info -->

                <div class="col-lg-6">
                    <div class="order checkout_section">
                        <div class="section_title">Your order</div>
                        <div class="section_subtitle">Order details</div>

                        <!-- Order details -->
                        <div class="order_list_container">
                            <div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Product</div>
                                <div class="order_list_value ml-auto">Total</div>
                            </div>

                            <ul class="order_list">
                                @foreach($cart as $item)
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">{{$item->name}}</div>
                                    <div class="order_list_value ml-auto">{{$item->price * $item->quantity}}</div>
                                </li>
                                @endforeach

                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Total</div>
                                    <div class="order_list_value ml-auto">{{$sum}}</div>
                                </li>
                            </ul>
                        </div>

                        <!-- Payment Options -->
                        <div class="payment">
                            <div class="payment_options">
                                <label class="payment_option clearfix">Paypal
                                    <input type="radio" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="payment_option clearfix">Cach on delivery
                                    <input type="radio" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="payment_option clearfix">Credit card
                                    <input type="radio" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="payment_option clearfix">Direct bank transfer
                                    <input type="radio" checked="checked" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <!-- Order Text -->
                        <div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>
                        <div class="button order_button"><a href="{{route('makeOrder')}}">Place Order</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
