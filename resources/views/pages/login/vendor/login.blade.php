<?php
    use Illuminate\Support\Facades\Hash;
?>
@extends('pages.login.vendor.loginMain')
@section('home')
<section>
    <div class="container login">
        <div class="row justify-content-evenly llogin">
            <div class="col-md-5">
                <img class="img-fluid images" src="/image/login/login.jpg" alt="sing up image">
            </div>
            <div class="col-md-5">
                        <h2 class="form-title1">Sign In</h2>
                        <form action="/vendorLogin" method="POST">
                            @csrf
                            @if (session('status'))
                                <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="form-group1">
                                <label for="your_name" class="labels"><span style="color:#6dabe4;"><i class="bi bi-person-fill"></i></span></label>
                                <input type="email" class="value form-control inputs" name="email" id="your_name" placeholder="Your email"/>
                                <span style="color: red; font-size:12px;">@error('email'){{ $message }}@enderror</span>
    
                            </div>
                            <div class="form-group1">
                                <label for="your_pass" class="labels"><span style="color:#6dabe4;"><i class="bi bi-unlock-fill"></i></span></label>
                                <input type="password" class="form-control inputs" name="password" placeholder="Password"/>
                                <span style="color: red; font-size:12px;">@error('password'){{ $message }}@enderror</span>
                 
                            </div>
                           
                            <div class="form-group1 form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit1" value="Log in"/>
                            </div>
                            <div class="form-group2">
                                <ul style="margin-bottom: 0px;">
                                    <li><p>Not Registered ! </p></li>
                                    <li>
                                        <div class="dropdown choose">
                                            <a class="dropdown-toggle " data-bs-toggle="dropdown" href="#" class="signup">SignUp</a>        
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/customer">Customer</a>
                                                <a class="dropdown-item" href="/vendor">vendor</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</section>
@endsection
