
@extends('pages.dashboard.vendor.vendorMain')
@section('home')
<?php
    use App\Models\vendorDetails;
    use App\Models\Post;
    $detail = vendorDetails::all();
    $post = Post::all();
?>
<?php
 foreach ($detail as $item){
   
    $mail = Session::get('user')['email']; 
    $mail1 = $item->email;
    if ($mail == $mail1)
    {
        $experience = $item->experience;
        $service = $item->service;
        $payment = $item->payment;
        $price = $item->price;
        $date = $item->date;
        $location = $item->location;
        $txt = $item->txt;
        break;
    } else{
        $experience = 'N\A';
        $service = 'N\A';
        $payment = 'N\A';
        $price = 'N\A';
        $date = 'N\A';
        $location = 'N\A';
        $txt = 'N\A';
    }
}?>

<?php
 foreach ($post as $items){
   
    $mail = Session::get('user')['email']; 
    $mail1 = $items->sessionEmail;
    $value = 0;
    if ($mail == $mail1)
    {
        $uploadDate = $items->uploadDate;
        $imgFile = $items->imgFile;
        $caption = $items->caption;
        break;
    } else{
        $uploadDate = 'N\A';
        $imgFile = 'N\A';
        $caption = 'N\A';
    }
}?>
    
    <!--latest post and description-->
    <div class="container pb-4 pt-5">
        <div class="row">
            <div class="col-xl-5   success-title">
                <span class="trend mb-2">Activities</span>
                <h4>Latest Post</h4>
            </div>
        </div>
    
        <div class="row justify-content-evenly">
         
            <div class="col-md-3">
              
                    <div class="row justify-content-center">
                                    <div class="col-md-10">
                                                <div class="container" id="success-carousel-img1">                                                              
                                                    <p>{{$uploadDate}}</p>            
                                                </div>
                                                <div class=" container success-carousel-details">
                                                    <ul>
                                                        <div class="row mt-3">
                                                            <div class="col-md-11">
                                                                <p>{{$caption}}</p>
                                                            </div>
                                                        </div>        
                                                        <li>
                                                            <a href="/indereni"> 
                                                                <button type="button" class="btn" id="blog-btn">Share</button>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div> 
                                    </div>
                    </div>
          
            </div> 
          

            <div class="col-md-5 desc " style="margin-left:10px;">
                            <div>
                            
                                    <h2> <span style="font-weight:bold">|</span> {{ Session::get('user')['name'] }}</h2>
                            </div>
                            
                            <div class="ratings">  
                                <ul style="padding-left: 15px !important;">
                                    <li>
                                        <div class="aboutButton as">
                                            <button class="btnn" id="btnMiss">
                                                <span class="sth">
                                                    <div id="content">
                                                        <p><i class="bi bi-hand-thumbs-up-fill"></i> &nbsp;&nbsp;&nbsp;Like</p>
                                                    </div>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="aboutButton as">
                                            <button class="btnn" id="btnVal">
                                                <span class="sth">
                                                    <div id="content">
                                                        <p><i class="bi bi-hand-thumbs-down-fill"></i></p>
                                                    </div>
                                                </span>
                                            </button>
                                        </div>  
                                    </li>  
                                </ul> 
                            </div> 
                    
                        <div class="row justify-content-center">
                            <div class="col-md-6 exp">
                                <h3><span style="font-weight:bold;">Experience:<br></span>{{$experience}}</h3>
                            </div>
                            <div class="col-md-5 ser">
                                <h3><span style="font-weight:bold;">Service:<br></span>{{$service}}</h3>
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
                            <div class="col-md-11 exp" style="margin-top:10px;">
                                <h3><span style="font-weight:bold;margin-top:10px;">Price:<br></span>{{$price}}</h3>
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
                <div class="ratings">  
                                <ul style="padding-left: 0px !important;">
                                    <li>
                                        <div>
                                            <button class="book" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                <span class="sth">
                                                    <div id="content">
                                                        <p>Book</p>
                                                    </div>
                                                </span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="book" data-toggle="modal" data-target=".bd-example-modal-lg3">
                                                <span class="sth">
                                                    <div id="content">
                                                        <p>Cancel</p>
                                                    </div>
                                                </span>
                                            </button>
                                        </div>  
                                    </li>  
                                </ul> 
                </div> 
                <p><span style="font-weight:bold;">Not available: </span>{{$date}}</p>
            </div>
            <div class="col-md-7">
                <form>
                    <div class="form-group pt-3 rating">
                        <ul style="padding-left:0px !important;margin-bottom:0px !important;">
                            <li>
                                <p><span style="font-weight:bold;color: rgb(39 39 39 / 87%);">Provide rating: </span></p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                </div>
                            </li>
                        </ul>
                        
                        <br>
                        <textarea type="text" class="form-control" placeholder="Write your review" rows="9"></textarea>
                        <br>
                        <button type="button" class="btn btn-danger mb-5">Submit</button>
                    </div>
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

    <div class="modal fade bd-example-modal-lg" id="models" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel" style="font-weight:bold;">Make a Reservation</h6>  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">    
                    <div class="row pt-2">
                        <div class="col-6">
                            <form>
                                <div class="form-group pt-3">
                                    <h6 style="font-weight:550px;">Full Name *</h6>
                                    <input type="text" class="form-control" placeholder="Full Name">
                                    <br>
                                    <h6 style="font-weight:550px;">Phone No. *</h6>
                                    <input type="email" class="form-control" placeholder="Phone No.">
                                    <br>
                                    <h6 style="font-weight:550px;">Choose date *</h6>
                                    <input type="email" class="form-control" placeholder="Enter the date">
                                    
                                    <br>
                                
                                </div>
                            </form>
                        </div>
                            
                        <div class="col-6">
                            <form>
                                <div class="form-group pt-3">
                                    <h6 style="font-weight:550px;">Email Address *</h6>
                                    <input type="text" class="form-control" placeholder="Enter your email address">
                                    <br>
                                    <h6 style="font-weight:550px;">Location *</h6>
                                    <input type="email" class="form-control" placeholder="Enter your location">
                                    <br>
                                    <h6 style="font-weight:550px;">Service *</h6>
                                    <div class="form-check booking">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Home
                                        </label>
                                    </div>
                                    <div class="form-check booking">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Studio
                                        </label>
                                    </div>
                                <br>
                                <button type="button" class="btn btn-danger mb-5" id="submit" data-toggle="modal" data-target=".bd-example-modal-lg1" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-danger mb-5" id="cancel" data-dismiss="modal">Cancel</button>
                            
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel" style="font-weight:bold;">Make a Reservation</h6>  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">    
                    <div class="row pt-2 justify-content-center">
                        <div class="col-md-4">
                            <br>
                            <h5>Powered By:</h5>
                            <img src="/image/Book/Khalti logo.png" alt="image" class="img-fluid">
                            <form>
                                <div class="form-group pt-3">
                                    <button type="button" class="btn btn-danger mb-5" data-toggle="modal" data-target=".bd-example-modal-lg2" data-dismiss="modal">Advance Payment</button>              
                                </div>
                            </form>
                        </div>  
                        <div class="col-md-7">
                            <form>
                                <div class="form-group pt-3">
                                    <h6 style="font-weight:550px;">Total Payment</h6>
                                    <input type="text" class="form-control" placeholder="5000">
                                    <br>
                                    <h6 style="font-weight:550px;">Comment/question *</h6>
                                    <textarea type="text" class="form-control" placeholder="Message" rows="8"></textarea>
                                    <br>    
                                </div>
                            </form>
                        </div>
                                
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal bd-example-modal-lg2" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header alert alert-success">
            <h5 class="modal-title" id="exampleModalLabel">Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <p>Successfully Booked !!</p>   
        </div>
        </div>
    </div>
    </div>

    <div class="modal bd-example-modal-lg3" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header alert alert-danger">
            <h5 class="modal-title" id="exampleModalLabel">Cancellation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <p>Your booking has been cancelled !</p>   
        </div>
        </div>
    </div>
    </div>

@endsection