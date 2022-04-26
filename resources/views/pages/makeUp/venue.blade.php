<?php
    use App\Models\Approved;
    $make = Approved::all();
?>
@extends('pages.makeUp.makeUpMain')
@section('home')
<!--banner-->
<div class="header">     
    <div class="container">
        <div class="row justify-content-center slider-text align-items-center mt-6">
            <div class="col-md-6 col-lg-8 area">
                <div class="text-center">
                    <h1 class="mt-5" style="color: white;font-size:35px;">Vendor that best fit for you</h1>
                    <h1 id="bann"><a href="/">Home</a>><a href="/service">Service</a>><a href="/venue">Venue Vendors</a></h1>
                </div>
                <form action="/search" class="search-location mt-md-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 align-items-end">
                        <div class="form-group">
                            <div class="form-field">
                            
                            <input type="text" name="search" class="form-control" placeholder="Search City">
                            <button>
                                    <i class="bi bi-search" id="nn"></i>
                            </button>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>   
    </div>
</div>

<!--first row of category-->
<div class="row justify-content-center rows" style="padding-top: 70px;">
        <div class="col-md-12 heading-section text-center mt-0">
            <span class="subheading mb-2">Venue Vendor</span>
            <h3 style="margin-bottom:20px">The best that suits you</h3>
        </div>
</div>

<!--category-->
<div class="container-fluid" style="padding-bottom:18px;">
    <div class="row justify-content-evenly" id="category">
        <div class="col-md-12 col-10" id="categorytxt">
            <div class="row justify-content-center" id="categoryRow1">
                <?php
                    $name = "Venue";
                ?>
                @foreach ($make as $item)
                    @if ( $item->vendorType == $name && $item->approves == 1)
                        <div class="col-md-3" id="categoryCol1" style="background-color: rgb(223, 178, 173);">
                                <div class=" img1 d-none d-md-block">
                                
                                <a href="{{ url('customizeVenue/'.$item->email) }}" class="btn btn-primary btn-sm">
                                    <button type="submit" class="btn mt-2" id="blog-btn">Details</button>
                                </a>
                                    
                                </div>  
                                <div class="" id="categorytxt">
                                    <h5>{{ $item->name}}</h5>
                                    <p><span style="font-weight:bold;">Location: {{ $item->address}}</span></p>            
                                </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
             <!--             
                <div class="col-md-3" id="categoryCol1" style="background-color: rgb(223, 178, 173);">
                    <div class=" img2 d-none d-md-block">
                        <button type="button" class="btn mt-2" id="blog-btn">Details</button>
                    </div>  
                    <div class="" id="categorytxt">
                        <h5>Pareli Makeup</h5>
                        <p><span style="font-weight:bold;">Experience:</span> 2 years | <span style="font-weight:bold;">Service:</span> Both home and studio | <span style="font-weight:bold;">Location:</span> Dharan</p>       
                    </div>
                </div>

                <div class="col-md-3" id="categoryCol1" style="background-color: rgb(207, 205, 184);">
                    <div class=" img3 d-none d-md-block">
                        <button type="button" class="btn mt-2" id="blog-btn">Details</button>
                    </div>  
                    <div class="" id="categorytxt">
                        <h5>Purna Makeup</h5>
                        <p><span style="font-weight:bold;">Experience:</span> 2 years | <span style="font-weight:bold;">Service:</span> Both home and studio | <span style="font-weight:bold;">Location:</span> Dharan</p>             
                    </div>
                </div>
                
            </div>

            <div class="row justify-content-center" id="categoryRow1">
                <div class="col-md-3" id="categoryCol1" style="background-color: rgb(207, 205, 184);">
                    <div class=" img4 d-none d-md-block">
                        <button type="button" class="btn mt-2" id="blog-btn">Details</button>   
                    </div>  
                    <div class="" id="categorytxt">
                        <h5>Shanti Parlour</h5>
                        <p><span style="font-weight:bold;">Experience:</span> 2 years | <span style="font-weight:bold;">Service:</span> Both home and studio | <span style="font-weight:bold;">Location:</span> Dharan</p>                
                    </div>
                </div>

                <div class="col-md-3" id="categoryCol1" style="background-color: rgb(229, 211, 189);">
                    <div class=" img1 d-none d-md-block">
                        <button type="button" class="btn mt-2" id="blog-btn">Details</button>    
                    </div>  
                    <div class="" id="categorytxt">
                        <h5>Indreni Makeup</h5>
                        <p><span style="font-weight:bold;">Experience:</span> 2 years | <span style="font-weight:bold;">Service:</span> Both home and studio | <span style="font-weight:bold;">Location:</span> Dharan</p>   
                    </div>
                </div>
            
                <div class="col-md-3" id="categoryCol1" style="background-color: rgb(207, 205, 184);">
                    <div class=" img4 d-none d-md-block">
                        <button type="button" class="btn mt-2" id="blog-btn">Details</button>   
                    </div>  
                    <div class="" id="categorytxt">
                        <h5>Dammi Makeup</h5>
                        <p><span style="font-weight:bold;">Experience:</span> 2 years | <span style="font-weight:bold;">Service:</span> Both home and studio | <span style="font-weight:bold;">Location:</span> Dharan</p>    
                    </div>
                </div>              
            </div>   
        </div>--> 
    </div>
</div>
@endsection
