@extends('pages.vendorPage.makeUp.indereniMain')
@section('home')
<?php
    use App\Models\vendorDetails;
    use App\Models\Post;
    use App\Models\Approved;
    use App\Models\Follow;
    use App\Models\makeUp;
    use App\Models\User;
    $detail = vendorDetails::all();
    $post = Post::all();
    $customer = User::all();
    $makeUp = Approved::all();
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
                $mail = $values; 
                $mail1 = $postItem->sessionEmail;
               
                if ($mail == $mail1)
                {
                    $uploadDate = $postItem->created_at;
                    $imgFile = $postItem->imgFile;
                    $caption = $postItem->caption;  
                } else{
                    $uploadDate = 'N\A';
                    $imgFile = 'N\A';
                    $caption = 'N\A';
                }
            ?>
            @if ($mail == $mail1)
                <div class="col-md-3">
                
                        <div class="row justify-content-center">
                                        <div class="col-md-10">
                                                    <div class="container" id="success-carousel-img1">                                                              
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
                                                            @if(Session::has('user'))
                                                                <?php
                                                            
                                                                    $founds = 'N\A';
                                                                    $userEmail=Session::get('user')['email'];
                                                                    foreach ($customer as $cust){
                                                                        if ($userEmail == $cust->email || $userEmail == 'admin@gmail.com'){
                                                                            $founds = 'yes';
                                                                            break;
                                                                        }
                                                                    }
                                                                ?>
                                                                @if ($founds != 'yes')
                                                                <li>
                                                                    <form action="{{ url('deletePost/'.$postItem->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn"><i class="bi bi-trash"></i></button>
                                                                    </form>
                                                                </li>
                                                                @endif
                                                            @endif
                                                        </ul>
                                                    </div> 
                                        </div>
                        </div>
            
                </div>
            @endif 
        @endforeach

        
      
           <?php
            foreach ($detail as $item){
            
                $mail = $values; 
                $mail1 = $item->email;
                if ($mail == $mail1)
                {
                    $experience = $item->experience;
                    $service = $item->service;
                    $payment = $item->payment;
                    $price = $item->price;
                    $price1 = $item->price1;
                    $date = $item->date;
                    $location = $item->location;
                    $txt = $item->txt;
                    break;
                } else{
                    $experience = 'N\A';
                    $service = 'N\A';
                    $payment = 'N\A';
                    $price = 'N\A';
                    $price1 = 'N\A';
                    $date = 'N\A';
                    $location = 'N\A';
                    $txt = 'N\A';
                }
            }?>

            <?php
            foreach ($makeUp as $makeitem){
            
                $mail = $values;  
                $mail1 = $makeitem->email;
                if ($mail == $mail1)
                {
                    $name = $makeitem->name;
                    $view = $makeitem->view;
                    break;
                } else{
                    $name = 'N\A';
                    $view = 'N\A';
                }
            }?>

            <div class="col-md-5 desc " style="margin-left:10px;">
                            <div>
                            
                                    <h2> <span style="font-weight:bold">|</span> {{$name}}   <span style="color:grey; font-size:13px; margin-left:10px;">{{$view}} views</span></h2>
                                  
                       
                            </div>
                            @if(Session::has('user'))
                                <?php
                                    $venEmail = $values;
                                    $found = 'N\A';
                                    $userEmail=Session::get('user')['email'];
                                    foreach ($makeUp as $item){
                                        if ($userEmail == $item->email || $userEmail == 'admin@gmail.com'){
                                            $found = 'yes';
                                            break;
                                        }
                                    }
                                ?>
                                
                                
                                @if ($found != 'yes')
                                    @if (session('status'))
                                        <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                                    @endif
                                    <div class="ratings">  
                                        <ul style="padding-left: 15px !important;">
                                            <li>
                                                
                                            
                                                    <?php      
                                                        $follow = Follow::all();                                                                                                                                 
                                                        $vendorMail = $values;
                                                        $currentUser = Session::get('user')['email'];
                                                        $userFollowing = 'N\A';
                                                        $vendorFollowing = 'N\A';
                                                        $iid = 'N/A'; 
                                                        foreach ($follow as $following){
                                                            $userFollowing = $following->userEmail;
                                                            $vendorFollowing = $following->followedVendor;
                                                            $iid = $following->id;
                                                            if ($currentUser == $userFollowing && $vendorMail == $vendorFollowing)
                                                            {
                                                                break;
                                                            } else{
                                                                $userFollowing = 'N\A';
                                                                $vendorFollowing = 'N\A';
                                                                $iid = 'N/A';
                                                            }
                                                        }                                                     
                                                    ?>
                                                    @if ($currentUser == $userFollowing && $vendorMail == $vendorFollowing)
                                                        <div class="aboutButton as">
                                                            <form action="{{url('deleteFollow/'.$iid)}}" method="POST">
                                                                @csrf
                                                                <button class="btnn" id="btnVal">
                                                                    <span class="sth">
                                                                        <div id="content">
                                                                            <p><i class="bi bi-hand-thumbs-down-fill"></i></p>
                                                                        </div>
                                                                    </span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @else 
                                                        <div class="aboutButton as">
                                                            <form action="{{url('followSystem/'.$userEmail)}}" method="POST">
                                                                @csrf
                                                                <input class="form-check-input" type="hidden" name="followedVendor" value={{$venEmail}}>
                                                                <button class="btnn" type="submit" id="btnMiss">
                                                                        <span class="sth">
                                                                            <div id="content">
                                                                                <p><i class="bi bi-hand-thumbs-up-fill"></i> &nbsp;&nbsp;&nbsp;Like</p>
                                                                            </div>
                                                                        </span>
                                                                </button>
                                                            </form>        
                                                        </div>                                                  
                                                    @endif
                                        
                                            </li>  
                                        </ul> 
                                    </div>
                                @endif
                            @else
                                <br>
                            @endif
                    
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
                            <div class="col-md-6 exp" style="margin-top:10px;">
                                <h3><span style="font-weight:bold;margin-top:10px;">Venue Booking (Nrs):<br></span>{{$price}}</h3>
                            </div>
                            <div class="col-md-5 ser" style="margin-top:10px;">
                                <h3><span style="font-weight:bold;margin-top:10px;">Home Booking (Nrs):<br></span>{{$price1}}</h3>
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


    <?php
        $venEmail = $values;
    ?>

<!--calender-->
<div class="container" style="padding-top:20px;">
    <div class="row justify-content-evenly">
        <div class="col-md-4">
            <iframe src="https://www.hamropatro.com/widgets/calender-medium.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:295px; height:385px;" allowtransparency="true"></iframe>      
            <div class="ratings">  
                            <ul style="padding-left: 0px !important;">
                                <li>
                                    <div>
                                        <a href="{{url('books/'.$venEmail)}}">
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
