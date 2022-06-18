<?php
    use App\Models\Approved;
    use App\Models\Rating;
    $approve = Approved::all();
?>
@extends('pages.makeUp.makeUpMain')
@section('home')
<!--banner-->
<div class="header">     
    <div class="container">
        <div class="row justify-content-center slider-text align-items-center mt-6">
            <div class="col-md-6 col-lg-8 area">
                <div class="text-center">
                    <h1 class="mt-3" style="color: white;font-size:35px;">Vendor that best fit for you</h1>
                    <h1 id="bann"><a href="/">Home</a>><a href="/service">Service</a>><a href="/makeUp">Makeup Vendors</a></h1>
                </div>
              
            </div>
        </div>   
    </div>
</div>

<!--first row of category-->
<div class="row justify-content-center rows" style="padding-top: 70px;">
        <div class="col-md-12 heading-section text-center mt-0">
            <span class="subheading mb-2">Make-up Vendor</span>
            <h3 style="margin-bottom:20px">The best that suits you</h3>
        </div>
</div>

<!--category-->
<div class="container-fluid" style="padding-bottom:18px;">
    <div class="row justify-content-evenly" id="category">
        <div class="col-md-12 col-10" id="categorytxt">
            <div class="row justify-content-center" id="categoryRow1">
                <?php
                    $name = "Make Up";
                ?>
                @foreach ($approve as $item)

                    @if ( $item->vendorType == $name && $item->approves == 1)
                        <div class="col-md-3" id="categoryCol1">
                              
                             <img class ="img1" src ="{{ asset('uploads/vendor/'.$item->img) }}" alt="image">                                                         
                                                                                                                     
                                            
                               
                            
                                <div class="" id="categorytxt">
                                <a href="{{ url('customize/'.$item->email) }}" class="btn btn-primary btn-sm">
                                    <button type="submit" class="btn mt-2" id="blog-btn">Details</button>
                                </a>
                                <!--<ul style="list-style:none;display:flex;padding:0px !important;margin:0px!important;">-->
                                    
                                        <h5>{{ $item->name}} &nbsp;</h5>
                                        <p style="margin-bottom:10px;"><span style="font-weight:bold;">Location: {{ $item->address}}</span></p>
                                  
                                    <?php
                                    $rating = Rating::all();
                                    $vendEmail = $item->email;
                                    $reviewRating = array();
                                    foreach ($rating as $item){
                                        if ( $item->vendorEmail == $vendEmail){
                                            $rating = $item->rating;
                                            array_push($reviewRating, $rating);
                                        }                  
                                    }
                                    $totals = count($reviewRating);
                                    ?>
                                    @if ($totals)
                                        @php
                                            $sum = 0;
                                        @endphp
                                        @for ($i = 0; $i < $totals; $i++)
                                            <?php
                                                $value = $reviewRating[$i];
                                                $sum = $sum + $value;
                                            ?>
                                        @endfor
                                        <?php
                                        $avg = $sum / $totals;
                                        if (gettype($avg) == 'double'){
                                            $avg = bcdiv($avg, 1, 1);
                                        } 
                                        ?>
                                        
                                        <p style="margin-bottom:15px !important; background-color:#7872726e;width:fit-content; border-radius:20px;"><span style="padding:10px;"><span style="color: #e72e77;"><i class="bi bi-star-fill"></i></span>&nbsp;{{$avg}}</span></p>
                                    
                                   
                                @endif 
                                
                                
                              
                                               
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
