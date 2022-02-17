@extends('pages.vendorPage.makeUp.indereniMain')
@section('home')
<div class="container login">    
                <div class="row justify-content-center llogin pt-2">
                        <?php
                        if(Session::has('user')){
                            $emails=Session::get('user')['email'];
                        } else{
                            $emails = 'dummy@gmail.com';
                        }
                        ?>

                
                    
                        <div class="col-md-9">
                            <h3 class="form-title1">Booking</h3>
                            <form action="{{ url('book/'.$emails) }}" method="POST">
                                @csrf
                                @if (session('status'))
                                    <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                                @endif
                                <div class="form-group1 pt-3" style="">
                                    <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                                    <span style="color: red; font-size:12px;">@error('fullName'){{ $message }}@enderror</span>
                                    <br>
                                    <input type="txt" class="form-control" name="phone" placeholder="Phone No.">
                                    <span style="color: red; font-size:12px;">@error('phone'){{ $message }}@enderror</span>
                                    <br>
                                    <input type="date" class="form-control" name="bookDate" placeholder="Enter the date">  
                                    <span style="color: red; font-size:12px;">@error('bookDate'){{ $message }}@enderror</span>
                                    <br>
                                    <input type="text" class="form-control" name="place" placeholder="Enter your location">
                                    <span style="color: red; font-size:12px;">@error('place'){{ $message }}@enderror</span>
                                    <br>

                                    <h6 style="font-weight:500px;padding-left:1.5em;">Service *</h6>
                                    <div class="form-check booking">
                                        <input class="form-check-input" type="radio" name="flexRadio" value = "Home" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Home
                                        </label>
                                    </div>
                                    <div class="form-check booking">
                                        <input class="form-check-input" type="radio" name="flexRadio" value = "Studio" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Studio
                                        </label>
                                    </div>
                                    <span style="color: red; font-size:12px;">@error('flexRadio'){{ $message }}@enderror</span>
                                    <br>
                                    <input type="email" class="form-control" name="venEmail" placeholder="Enter correct vendor email">
                                    <span style="color: red; font-size:12px;">@error('venEmail'){{ $message }}@enderror</span>
                                    <br>
                                    <input type="submit" class="btn btn-danger mb-5" id="submit" value="Submit Booking"/>
                                </div> 
                            </form>     
                        </div>
     
                </div>
            </div>
@endsection