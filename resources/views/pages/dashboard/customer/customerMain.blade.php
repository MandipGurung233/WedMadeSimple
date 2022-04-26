<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
        <link rel="stylesheet" href="css/dashboard/customer/customer.css">
    </head>
    <body>
    <header>
    <!--Top Navbar-->
    <?php 
   
use App\Http\Controllers\logging;
use App\Models\User;
use App\Models\Approved;
$name='';  
if(Session::has('user')){
    $name=Session::get('user')['email'];
    $user = User::where(['email'=>$name])->first();
    $user1 = Approved::where(['email'=>$name])->first();
    if (!$user){
        if (!$user1){
            $name='/adminDashboard';
        }else{
            $name='/vendDash'; 
        }      
    }
    else{
        $name='/custDash';
    }
}


?>

    <div class="navigationSecond">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid secondNav">
                
            <a class="navbar-brand" href="/" style="font-size:22px;color:white;">Wed<span style="font-weight:600;">Made</span>Simple</a>
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mt-2 mb-lg-0">
                            <li class="nav-item ">   
                                <a class="nav-link" aria-current="page" href="/about">About</a>  
                            </li>
                       
                            <li class="nav-item">
                                <a class="nav-link" href="/service">Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="/contact">Contact</a>
                            </li>
                            
                            @if(Session::has('user'))
                        
                            <div class="dropdown">
                                <a class="dropdown" data-bs-toggle="dropdown" href="#" class="signup"><button type="button" class="btns" id="banner-btn-1"><i class="bi bi-bell-fill" style="color:white;"></i><span style="color:red;"> {{$user->unreadNotifications->count()}}</span></button></a>        
                                <div class="dropdown-menu">
                                    @foreach($user->unreadNotifications as $notification)   
                                        <?php
                                    
                                        $custEmail = $notification->data['email']; 
                                        $name=Session::get('user')['email'];
                                        if ($custEmail == $name){
                                            $veEmail = $notification->data['venEmail'];    
                                            $find = Approved::where(['email'=>$veEmail])->first();
                                            $vendName = $find->name;
                                        }
                                        ?>
                                        @if ($custEmail == $name)
                                            <p class="dropdown-item" href=""> <b>{{$vendName}}</b><br>cancelled your booking<br>
                                            <a href="{{ route('markasread', $notification->id)}}" style="color:red;text-decoration:underline;">Mark as read</a>
                                            </p>                                        
                                        @endif
                                                                                                                              
                                    @endforeach                                   
                                </div>
                            </div>
                          
                            <div class="dropdown">
                                
                                <a class="dropdown-toggle " data-bs-toggle="dropdown" href="{{$name}}" class="signup"><button type="button" class="btns" id="banner-btn-1">{{ Session::get('user')['name'] }}</button></a>        
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/bookingHistory">Booking Details</a>
                                    <a class="dropdown-item" href="/newsFeed">NewsFeed</a>
                                    <a class="dropdown-item" href="{{ url('exportBooks') }}" name="export" class="btn btn-primary float-end repo" style="margin-right:40px; color:red; font-weight:bold;">Booking Details .CSV</a>
                   
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </div>
                            </div>

                            

                            @else
                            <div class="dropdown">
                                <a class="dropdown-toggle " data-bs-toggle="dropdown" href="#" class="signup"><button type="button" class="btns" id="banner-btn-1">Log-In</button></a>        
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/adminLogin">Admin</a>
                                    <a class="dropdown-item" href="/vendorLogin">Vendor</a>
                                    <a class="dropdown-item" href="/custLogin">Customer</a>
                                </div>
                            </div>
                            @endif
                    </ul>
                </div>  
            </div>
        </nav> 
    </div>
<!-- goto top arrow -->   
<div class="back">
    <a title="Go to Top" href="#"><i class="bi bi-caret-up-fill arrowUp"></i></a>
</div>
</header>
   
    @yield('home')
    {{ View::make('layout.footer') }}
</body>
</html>