
@extends('pages.dashboard.vendor.vendorMain')
@section('home')
<?php
    use App\Models\vendorDetails;
    use App\Models\Post;
    use App\Models\Review;
    use App\Models\Rating;
    use App\Models\User;
    use App\Models\Approved;
    $detail = vendorDetails::all();
    $post = Post::all();
    use App\Models\service;
    use App\Models\vendorDate;
    $vendorDate = vendorDate::all();
    $makeUp = Approved::all();
    $approvedOne = Approved::all();
?>

<?php
$experience = 'N\A';                  
$payment = 'N\A';
$txt = 'N\A';
 foreach ($detail as $item){
   
    $mail = Session::get('user')['email']; 
    $mail1 = $item->email;
    if ($mail == $mail1)
    {
        $experience = $item->experience;
        $payment = $item->payment;
        
                    break;
                }
}
?>
    
    <!--latest post and description-->
    <div class="container pb-4 pt-5">
        <div class="row">
            <div class="col-xl-5   success-title">
                <span class="trend mb-2">Activities</span>
                <h4>Latest Post</h4>
            </div>
        </div>
    
        <div class="row justify-content-evenly">
        @foreach ($post as $postItem)
            <?php
                $mail = Session::get('user')['email']; 
                $mail1 = $postItem->sessionEmail;
               
                if ($mail == $mail1)
                {
                    $uploadDate = $postItem->created_at;
                    $imgFile = $postItem->imgFile;
                    $caption = $postItem->caption;  
                }
            ?>
            @if ($mail == $mail1)
                <div class="col-md-3">
                
                        <div class="row justify-content-center">
                                        <div class="col-md-10">
                                                    <div class="container"> 
                                                        <img id="success-carousel-img1" src ="{{ asset('uploads/postImg/'.$imgFile) }}" alt="image">                                                            
                                                        <p>{{$uploadDate}}</p>            
                                                    </div>
                                                    <div class=" container success-carousel-details">
                                                        <div class="row mt-3">
                                                            <div class="col-md-11">
                                                                <p>{{$caption}}</p>
                                                            </div>
                                                        </div>  
                                                        <ul style="display:flex">
                                                                  
                                                            <li>
                                                                <a href="/indereni"> 
                                                                    <button type="button" class="btn" id="blog-btn">Share</button>
                                                                </a>
                                                            
                                                            </li>
                                                            <li>
                                                                <form action="{{ url('deletePost/'.$postItem->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn"><i class="bi bi-trash"></i></button>
                                                                </form>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div> 
                                        </div>
                        </div>
            
                </div>
            @endif 
        @endforeach

            <?php
                foreach ($makeUp as $makeitem){
                    $mail = Session::get('user')['email']; 
                    $mail1 = $makeitem->email;
                    if ($mail == $mail1)
                    {
                        $name = $makeitem->name;
                        $location = $makeitem->address;
                        $view = $makeitem->view;
                        $txt = $makeitem->description;
                        break;
                    } else{
                        $name = 'N\A';
                        $view = 'N\A';
                        $location = 'N\A';
                        $txt = 'N\A';
                    }                   
                }
            ?>

            <div class="col-md-5 desc " style="margin-left:10px;">
                            <div>
                            
                                    <h2> <span style="font-weight:bold">|</span> {{ Session::get('user')['name'] }} <span style="color:grey; font-size:13px; margin-left:10px;">{{$view}} views</span></h2>
                            </div>
                        <br>
                    
                        <div class="row justify-content-center">
                            <div class="col-md-6 exp">
                                <h3><span style="font-weight:bold;">Experience:<br></span>{{$experience}}</h3>
                            </div>
                            <div class="col-md-5 ser">
                                <h3><span style="font-weight:bold;">Service:</span>                             
                                <?php
                                    $datuu = 'N\A';
                                    $datuuu = 'N\A';
                                    $datu = 'N\A';
                                    $service = array();
                                    $service1 = array();
                                    $servic = service::all();
                                    foreach ($servic as $services){
                                        $emails = Session::get('user')['email'];  
                                        $ema = $services->email;       
                                        if ($ema == $emails){
                                            $seerv = $services->service;
                                            $pricee = $services->price;
                                            array_push($service, $seerv);
                                            array_push($service1, $pricee);
                                        }
                                    }
                                    $total_count1 = count($service);
                                    $total_count2 = count($service1);
                                    if ($total_count1 == 1){ 
                                        $seerv = 'N\A';
                                        $pricee = 'N\A';         
                                        array_push($service, $seerv);
                                        array_push($service1, $pricee);
                                       
                                    }

                                    if ($total_count1 != 0){
                                        $datuu = $service[0];
                                        $datuuu = $service[1];
                                    }
                                  
                                
                                ?>
                                    @for ($k = 0; $k < $total_count1; $k++)
                                        <?php

                                            $datu = $service[$k];
                                        ?>
                                        {{$datu}}, 
                                    @endfor
                                </h3>
                            </div>     
                        </div>
            
                        <div class="row justify-content-center">
                            <div class="col-md-6 exp">
                                <h3><span style="font-weight:bold;">Location:<br></span>{{$location}}</h3>
                            </div>
                            <div class="col-md-5 ser">
                                <h3><span style="font-weight:bold;">Payment:<br></span>{{$payment}}</h3>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6 exp" style="margin-top:10px;">
                                <h3><span style="font-weight:bold;margin-top:10px;">{{$datuu}} Booking (Nrs):</span>
                           
                                    <?php
                                        if ($total_count2 != 0){
                                            $datu = $service1[0];
                                        }
                                           
                                    ?>
                                
                                    {{$datu}}
                        
                                </h3>
                            </div> 
                            <div class="col-md-5 ser">
                                <h3><span style="font-weight:bold;margin-top:10px;">{{$datuuu}} Booking (Nrs):</span>
                                    <?php
                                        if ($total_count2 != 0){
                                            $datu = $service1[1];
                                        }
                                    ?>
                                
                                    {{$datu}}
                                </h3>
                            </div>
                        </div>
                        <div class="row justify-content-center exp">
                            <div class="col-md-11" style="margin-top:10px;">
                                <h3><span style="font-weight:bold;">Story:</h3>
                            </div>    
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-11 exp" style="text-align:justify;">
                                <h3>{{$txt}}</h3>
                            </div>
                        </div>
                    </div>          
        
            </div>
        </div> 
    </div>    
    </div>

    <!--calender-->
    <div class="container" style="padding-top:20px;">
        <div class="row justify-content-evenly">
            <div class="col-md-4">
                <iframe src="https://www.hamropatro.com/widgets/calender-medium.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:295px; height:385px;" allowtransparency="true"></iframe>      
                    <p><span style="font-weight:bold;">Not available:<br></span>
            <?php
            $seer = array();
            foreach ($vendorDate as $dates){
                $emails = Session::get('user')['email']; 
                $emai = $dates->email;       
                if ($emai == $emails){
                    $see = $dates->date;
                    array_push($seer, $see);
                }
            }
            $total_count = count($seer);
            ?>
            @for ($k = 0; $k < $total_count; $k++)
                <?php
                    $datu = $seer[$k];
                ?>
               {{$datu}}<br> 
            @endfor
          
          </p>
            </div>
                    
            <?php
             $emails = Session::get('user')['email']; 
            ?>
            <div class="col-md-7">
                <form action="/ratingSystem" method="POST">
                    @csrf
                    <input class="form-check-input" type="hidden" name="followedVendor" value={{$emails}}>
                    <?php
                    $rating = Rating::all();
                    $vendEmail = $emails;
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
                    <div class="form-group pt-3 rating">
                        <ul style="padding-left:0px !important;margin-bottom:0px !important;">
                            <li>
                                <p><span style="font-weight:bold;color: rgb(39 39 39 / 87%);">Provide rating: </span></p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value='1'>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value='2'>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value='3'>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value='4'>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value='5'>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-danger mb-5">Submit</button>
                            </li>
                        </ul> 
                        <span style="color: red; font-size:12px;">@error('flexRadioDefault'){{ $message }}@enderror</span>                    
                    </div>
                </form>
           
            <form action="/reviewSystem" method="POST">
                @csrf
                <input class="form-check-input" type="hidden" name="followedVendor" value={{$emails}}>
                <br>
                <textarea type="text" class="form-control" style="margin-bottom:5px;" name="review" placeholder="Write your review" rows="9"></textarea>
                
                <span style="color: red; font-size:12px;">@error('review'){{ $message }}@enderror</span>
                <br>
               
            <?php
                $review = Review::all();
                $vendEmail = $emails;
                $reviewID = array();
                foreach ($review as $item){
                    if ( $item->vendorEmail == $vendEmail){
                        $reviewid = $item->id;
                        array_push($reviewID, $reviewid);
                    }                  
                }
                $totals = count($reviewID);
            ?>
            @for ($i = 0; $i < $totals; $i++)
                <?php
                    $value = Review::find($reviewID[$i]);
                    $review = $value->review;
                    $userEm = $value->userEmail;
                    $finds = User::where(['email'=>$userEm])->first();
                    if ($finds){
                        $customer = $finds->name;
                    } else{
                        $finds = Approved::where(['email'=>$userEm])->first();
                        $customer = $finds->name;
                    }
                    
                ?>
                <p style="background-color:#1a09091f;border-radius:22px;width:max-content;"><span style="font-size:12px;font-style:arial;padding:15px;padding-bottom:0px!important;">{{$customer}}</span><br>
                <span style="font-style:arial;padding-top:0px!important;padding:15px;font-size:15px;">{{$review}}</p>
            @endfor
            <button type="submit" class="btn btn-danger mb-5">Submit</button>
            </form>
            </div>
        </div>
    </div>

    <!--Photo-->
    <div class="container pb-5 pt-1">
        <div class="row justify-content-center rows" style="padding-top: 25px;">
            <div class="col-md-12 heading-section text-center mt-0">
                <span class="subheading mb-2">Activities</span>
                <h3 style="margin-bottom:30px">Gallery, Expo</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                        <div class="owl-carousel owl-theme owl-carousel-wrap mt-2 pt-2">                      
                                <div class="item success-carousel-item pt-2">    
                                        <div class="imgs">
                                            <img src="/image/home/wed2.jpg" alt="image" class="img-fluid ">
                                        </div>
                                </div>                            
                                <div class="item success-carousel-item pt-2">    
                                        <div class="imgs">
                                            <img src="/image/home/wed4.jpg" alt="image" class="img-fluid">
                                        </div>
                                                        
                                </div>
                                <div class="item success-carousel-item pt-2">    
                                        <div class="imgs">
                                            <img src="/image/home/wed3.png" alt="image" class="img-fluid">
                                        </div>
                                                            
                                </div>
                                <div class="item success-carousel-item pt-2">    
                                        <div class="imgs">
                                            <img src="/image/home/wed1.jpeg" alt="image" class="img-fluid">
                                        </div>
                                                            
                                </div>                        
                        </div>
            </div>
        </div>
    </div>
@endsection