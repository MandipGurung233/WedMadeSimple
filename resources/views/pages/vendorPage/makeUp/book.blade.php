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

                        
                        <?php
                            $venEmail = $values;
                        ?>

                
                    
                        <div class="col-md-9">
                          
                            <form action="{{ url('book/'.$venEmail) }}" method="POST">
                                @csrf
                                @if (session('status'))
                                    <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                                @endif
                                <div class="form-group1 pt-3" style="">
                                    <h6 style="font-weight:500px;padding-left:1.5em;">Booking Date *</h6><br>
                                    <input type="date" class="form-control" name="bookDate" placeholder="Enter the date">  
                                    <span style="color: red; font-size:12px;">@error('bookDate'){{ $message }}@enderror</span>
                                    <br>                               

                                    <h6 style="font-weight:500px;padding-left:1.5em;">Service *</h6><br>
                                    <div class="form-check booking">
                                        <input class="form-check-input" type="radio" name="service" value = "Home" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Home
                                        </label>
                                    </div>
                                    <div class="form-check booking">
                                        <input class="form-check-input" type="radio" name="service" value = "Studio" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Studio
                                        </label>
                                    </div>
                                    <span style="color: red; font-size:12px;">@error('service'){{ $message }}@enderror</span>
                                    <br>
                                     <textarea type="text" class="form-control" name="comment" placeholder="Write your comment" rows="4"></textarea>
                                     <span style="color: red; font-size:12px;">@error('comment'){{ $message }}@enderror</span>
                                     <br>
                                    <input type="submit" class="btn btn-danger mb-5" id="submit" value="Submit Booking"/>
                                </div> 
                            </form>     
                        </div>
     
                </div>
            </div>
@endsection