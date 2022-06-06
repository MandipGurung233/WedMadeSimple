@extends('pages.registration.vendor.vendorMain')
@section('home')
<section>
    <div class="container login">
        <div class="row justify-content-center llogin">
            
            <div class="col-md-9">
                        <h2 class="form-title1">Vendor Registration</h2>
                        <form action="/vendorRegister" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (session('status'))
                                <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="form-group1">
                                <label for="your_name" class="labels"><span style="color:#6dabe4;"><i class="bi bi-person-fill"></i></span></label>
                                <input type="text" class="form-control inputs" name="name" id="your_name" placeholder="Vendor Name"/>
                                <span style="color: red; font-size:12px;">@error('name'){{ $message }}@enderror</span>
                            
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-geo-alt-fill"></i></span></label>
                                <input type="text" class="form-control inputs" name="address" id="your_name" placeholder="Vendor Address"/>
                                <span style="color: red; font-size:12px;">@error('address'){{ $message }}@enderror</span>
                            
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-envelope-fill"></i></span></label>
                                <input type="email" class="form-control inputs" name="email" id="your_name" placeholder="Vendor Email"/>
                                <span style="color: red; font-size:12px;">@error('email'){{ $message }}@enderror</span>
                            
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-unlock-fill"></i></span></label>
                                <input type="password" class="form-control inputs" name="password" id="your_name" placeholder="Password"/>
                                <span style="color: red; font-size:12px;">@error('password'){{ $message }}@enderror</span>
                            
                            </div>
                            <div class="form-group1">
                                <p><span style="color:#6dabe4; margin-right: 15px;font-size:14px!important;"><i class="bi bi-briefcase-fill"></i></span>Please state your business type : </p>
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <div class="form-check multiple">
                                            <input class="form-check-input" type="radio" name="vendorType" value="Make Up" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Make Up
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-check multiple">
                                            <input class="form-check-input" type="radio" name="vendorType" value="Venue" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Venue
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <div class="form-check multiple">
                                            <input class="form-check-input" type="radio" name="vendorType" value="Photography" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Photography
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-check multiple">
                                            <input class="form-check-input" type="radio" name="vendorType" value="Clothing" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Clothing
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <span style="color: red; font-size:12px;">@error('vendorType'){{ $message }}@enderror</span>
                            
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"></span></label>   
                                <textarea type="text" class="form-control inputs" name="description" placeholder="description" id ="your_name" rows="4"></textarea> 
                                <span style="color: red; font-size:12px;">@error('description'){{ $message }}@enderror</span>   
                            </div>
                         
                            
                            
                                <div class="form-group1">
                                    <p>Please provide supporting documents: </p>
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
                                    <br>
                                    <span style="color: red; font-size:12px;">@error('file'){{ $message }}@enderror</span>
                                </div>

                                <div class="form-group1">
                                    <p>Please upload your profile: </p>
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" class="form-control-file" name="img" id="exampleFormControlFile1">
                                    <br>
                                    <span style="color: red; font-size:12px;">@error('file'){{ $message }}@enderror</span>
                                </div>

                            
                                       
                            <div class="form-group1 form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit1" value="Register"/>
                            </div>
                            <div class="form-group2">
                                    <p>Already Registered ! <a href="/vendorLogin" class="signup" style="border-bottom:1px solid;">Login</a></p>      
                                </ul>
                            </div>
                            
                        </form>
            </div>
        </div>
    </div>
</section>
@endsection
