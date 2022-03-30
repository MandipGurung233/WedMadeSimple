@extends('pages.dashboard.vendor.vendorMain')
@section('home')
<section>
    <div class="container login">
        <div class="row justify-content-center llogin">
            
            <div class="col-md-9">
                        <h2 class="form-title1">Please upload your details</h2>
                        <?php
                      
                        if(Session::has('user')){
                            $emails=Session::get('user')['email'];
                        }?>
                        <form action="{{ url('vendorDetails/'.$emails) }}" method="POST">
                            @csrf
                            @if (session('status'))
                                <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="form-group1">
                                <label for="your_name" class="labels"><span style="color:#6dabe4;"><i class="bi bi-person-fill"></i></span></label>
                                <input type="text" class="form-control inputs" name="experience" id="your_name" placeholder="Experience"/>
                                <span style="color: red; font-size:12px;">@error('experience'){{ $message }}@enderror</span>
                            
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-geo-alt-fill"></i></span></label>
                                <input type="text" class="form-control inputs" name="service" id="your_name" placeholder="Service"/>
                                <span style="color: red; font-size:12px;">@error('service'){{ $message }}@enderror</span>
                            
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-envelope-fill"></i></span></label>
                                <input type="text" class="form-control inputs" name="payment" id="your_name" placeholder="Payment method"/>
                                <span style="color: red; font-size:12px;">@error('payment'){{ $message }}@enderror</span>
                            
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-unlock-fill"></i></span></label>
                                <input type="number" class="form-control inputs" name="price" id="your_name" placeholder="venue booking price"/>
                                <span style="color: red; font-size:12px;">@error('price'){{ $message }}@enderror</span>   
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-unlock-fill"></i></span></label>
                                <input type="number" class="form-control inputs" name="price1" id="your_name" placeholder="home booking price"/>
                                <span style="color: red; font-size:12px;">@error('price1'){{ $message }}@enderror</span>   
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-unlock-fill"></i></span></label>
                                <input type="text" class="form-control inputs" name="date" id="your_name" placeholder="Unavailable date"/>
                                <span style="color: red; font-size:12px;">@error('date'){{ $message }}@enderror</span>   
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-unlock-fill"></i></span></label>
                                <input type="text" class="form-control inputs" name="location" id="your_name" placeholder="Enter your location"/>
                                <span style="color: red; font-size:12px;">@error('location'){{ $message }}@enderror</span>   
                            </div>
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"></span></label>   
                                <textarea type="text" class="form-control inputs" name="txt" placeholder="Brief intro" id ="your_name" rows="8"></textarea> 
                                <span style="color: red; font-size:12px;">@error('txt'){{ $message }}@enderror</span>   
                            </div>
                                 
                            <div class="form-group1 form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit1" value="Upload"/>
                            </div>
                            
                        </form>
            </div>
        </div>
    </div>
</section>
@endsection
