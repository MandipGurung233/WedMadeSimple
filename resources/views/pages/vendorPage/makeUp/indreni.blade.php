@extends('pages.vendorPage.makeUp.indereniMain')
@section('home')

<!--banner-->
<div class="header">     
    <div class="container">
        <div class="row justify-content-center slider-text align-items-center mt-6">
            <div class="col-md-6 col-lg-8 area">
                <div class="text-center">
                    <h1 class="mt-5" style="color: white;font-size:35px;">Welcome to Indereni Make-up</h1>
                    <h1 id="bann"><a href="/">Home</a>><a href="/service">Service</a>><a href="/makeUp">Makeup Vendors</a>><a href="/makeUp">Indereni MakeUp</a></h1>
                </div>
            </div>
        </div>   
    </div>
</div>

<!--latest post and description-->
<div class="container pb-5 pt-5">
    <div class="row">
        <div class="col-xl-5   success-title">
            <span class="trend mb-2">Activities</span>
            <h4>Latest Post</h4>
        </div>
    </div>

  
    <div class="row justify-content-evenly">
        <div class="col-md-6">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="20000">
                        <div class="row justify-content-evenly">
                                <div class="col-md-6">
                                            <div class="container" id="success-carousel-img1">                                                              
                                                <p>11 july, 2020</p>            
                                            </div>
                                            <div class=" container success-carousel-details">
                                                <ul>
                                                    <div class="row mt-3">
                                                        <div class="col-md-11">
                                                            <p>New birdal makeup, hurry up for the limited offer !!</p>
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
                                <div class="col-md-6">
                                            <div class="container" id="success-carousel-img2">                                                              
                                                <p>11 july, 2020</p>            
                                            </div>
                                            <div class=" container success-carousel-details">
                                                <ul>
                                                    <div class="row mt-3">
                                                        <div class="col-md-11">
                                                            <p>New birdal makeup, hurry up for the limited offer !!</p>
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
                    <div class="carousel-item">
                            <div class="row justify-content-evenly">
                                <div class="col-md-6">
                                            <div class="container" id="success-carousel-img1">                                                              
                                                <p>11 july, 2020</p>            
                                            </div>
                                            <div class=" container success-carousel-details">
                                                <ul>
                                                    <div class="row mt-3">
                                                        <div class="col-md-11">
                                                            <p>New birdal makeup, hurry up for the limited offer !!</p>
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
                                <div class="col-md-6">
                                            <div class="container" id="success-carousel-img2">                                                              
                                                <p>11 july, 2020</p>            
                                            </div>
                                            <div class=" container success-carousel-details">
                                                <ul>
                                                    <div class="row mt-3">
                                                        <div class="col-md-11">
                                                            <p>New birdal makeup, hurry up for the limited offer !!</p>
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
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>  

        <div class="col-md-5 desc " style="margin-left:10px;">
                        <div>
                            <h2> <span style="font-weight:bold">|</span> Indereni Makeup </h2>
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
                            <h3><span style="font-weight:bold;">Experience:<br></span> 2 years </h3>
                        </div>
                        <div class="col-md-5 ser">
                            <h3><span style="font-weight:bold;">Service:<br></span> Both home and studio </h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 exp">
                            <h3><span style="font-weight:bold;">Location:<br></span> Jhapa-9, sallaghari </h3>
                        </div>
                        <div class="col-md-5 ser">
                            <h3><span style="font-weight:bold;">Payment:<br></span> Both online / cash </h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-11 exp" style="margin-top:10px;">
                            <h3><span style="font-weight:bold;margin-top:10px;">Price:<br></span> Nrs: 3000 per day | Nrs 2000 for bridal </h3>
                        </div>
                    </div>
                    <div class="row justify-content-center exp">
                        <div class="col-md-11" style="margin-top:10px;">
                            <h3><span style="font-weight:bold;">Story:</h3>
                        </div>    
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-11 exp" style="text-align:justify;">
                            <h3>lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsum v lorem ipsum dipsum m dipsum v lorem ipsum dipsum m dipsum v lorem ipsum dipsum m dipsum v lorem ipsum dipsum</h3>
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
                                        <a href="/books">
                                            <button class="book">
                                                <span class="sth">
                                                    <div id="content">
                                                        <p>Book</p>
                                                    </div>
                                                </span>
                                            </button>
                                        </a>
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
            <p><span style="font-weight:bold;">Not available: </span> 10, 20, 23, 45</p>
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
                <div class="row  pt-2">
                        <?php
                        if(Session::has('user')){
                            $emails=Session::get('user')['email'];
                        } else{
                            $emails = 'dummy@gmail.com';
                        }
                        ?>

                
                    
                        <div class="col-9">
                            <form action="{{ url('book/'.$emails) }}" method="POST">
                                @csrf
                                @if (session('status'))
                                    <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                                @endif
                                <div class="form-group pt-3" style="">
                                    <h6 style="font-weight:550px;">Full Name *</h6>
                                    <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                                    <span style="color: red; font-size:12px;">@error('fullName'){{ $message }}@enderror</span>
                                    <br>
                                    <h6 style="font-weight:550px;">Phone No. *</h6>
                                    <input type="number" class="form-control" name="phone" placeholder="Phone No.">
                                    <span style="color: red; font-size:12px;">@error('phone'){{ $message }}@enderror</span>
                                    <br>
                                    <h6 style="font-weight:550px;">Choose date *</h6>
                                    <input type="date" class="form-control" name="bookDate" placeholder="Enter the date">  
                                    <span style="color: red; font-size:12px;">@error('bookDate'){{ $message }}@enderror</span>
                                    <br>
                                    <h6 style="font-weight:550px;">Location *</h6>
                                    <input type="text" class="form-control" name="place" placeholder="Enter your location">
                                    <span style="color: red; font-size:12px;">@error('place'){{ $message }}@enderror</span>
                                    <br>

                                    <h6 style="font-weight:550px;">Service *</h6>
                                    <div class="form-check booking">
                                        <input class="form-check-input" type="radio" name="flexRadio" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Home
                                        </label>
                                    </div>
                                    <div class="form-check booking">
                                        <input class="form-check-input" type="radio" name="flexRadio" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Studio
                                        </label>
                                    </div>
                                    <span style="color: red; font-size:12px;">@error('flexRadio'){{ $message }}@enderror</span>
                                    <br>
                                    <h6 style="font-weight:550px;">Please enter vendor Email Address *</h6>
                                    <input type="email" class="form-control" name="venEmail" placeholder="Enter correct vendor email">
                                    <span style="color: red; font-size:12px;">@error('venEmail'){{ $message }}@enderror</span>
                                    <br>
                                    <input type="submit" class="btn btn-danger mb-5" id="submit" value="Submit Booking"/>
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
