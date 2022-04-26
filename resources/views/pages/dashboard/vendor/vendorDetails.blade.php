@extends('pages.dashboard.vendor.vendorMain')
@section('home')
<?php
use App\Models\vendorDate;
$vendorDate = vendorDate::all();
?>
<section>
    <div class="container login">
        <div class="row justify-content-center llogin">
            
            <div class="col-md-9">
                        <h5 class="form-title1" style="font-size: 18px;">Please upload your details</h5>
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
                                <label for="your_name" class="labels"><span style="color:#6dabe4;"><i class="bi bi-wallet-fill"></i></span></label>
                                <input type="text" class="form-control inputs" name="experience" id="your_name" placeholder="Experience"/>
                                <span style="color: red; font-size:12px;">@error('experience'){{ $message }}@enderror</span>
                            
                            </div>
                            
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-credit-card-2-front-fill"></i></span></label>
                                <input type="text" class="form-control inputs" name="payment" id="your_name" placeholder="Payment method"/>
                                <span style="color: red; font-size:12px;">@error('payment'){{ $message }}@enderror</span>
                            
                            </div>

                            <div class="form-group1 form-button" style="font-size:11px;">
                                <input type="submit" name="signin" id="signin" class="form-submit1" value="Upload"/>
                            </div>
                                  
                        </form>
                        <br>                       
                        <h5 class="form-title1" style="font-size: 18px;">Please upload your Unavailable date </h5>
      
                        <form action="{{ url('vendorDate/'.$emails) }}" method="POST">
                            @csrf
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-calendar-date-fill"></i></span></label>
                                <input type="date" class="form-control inputs" name="date" id="your_name" placeholder="Unavailable date"/>
                                <span style="color: red; font-size:12px;">@error('date'){{ $message }}@enderror</span>   
                            </div>                                             
                            <div class="form-group1 form-button"   style="font-size:11px;">
                                <input type="submit" name="signin" id="signin" class="form-submit1" value="Upload"/>
                            </div>
                        </form>
                    <div class="container" style="padding:0px !important">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="font-size: 14px;">Unavailable date
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="heading" style="font-size: 12px;">
                                             
                                                    <th>date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($vendorDate as $dates)
                                                    <?php
                                                        $mail = $dates->email;
                                                    ?>
                                                  
                                                    @if ($emails == $mail)
                                                        <tr class="heading-value" style="font-size: 12px;">
                                                       
                                                            <td>{{ $dates->date }}</td>
                                                            <td>
                                                                <form action="{{ url('destroyDate/'.$dates->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                    <br>
                        <form action="{{ url('vendorService/'.$emails) }}" method="POST">
                            @csrf
                            <h5 class="form-title1" style="font-size: 18px;">Please upload your Service details</h5>
                   
                           
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
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"><i class="bi bi-currency-dollar"></i></span></label>
                                <input type="number" class="form-control inputs" name="price" id="your_name" placeholder="venue booking price"/>
                                <span style="color: red; font-size:12px;">@error('price'){{ $message }}@enderror</span>   
                            </div>
                            <div class="form-group1 form-button"  style="font-size:11px;">
                                <input type="submit" name="signin" id="signin" class="form-submit1" value="Upload"/>
                            </div>
                        <form>
                        <br>

                      
            </div>
        </div>
    </div>
</section>
@endsection
