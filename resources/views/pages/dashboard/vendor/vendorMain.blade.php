<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <link rel="stylesheet" href="css/vendorRegister/vendor.css">
        <link rel="stylesheet" href="css/vendorPage/makeUp/makeUp.css">
        <script type="text/javascript" src="{{ asset('js/vendor/makeUp/makeUp.js') }}" defer></script>
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
                                <a class="dropdown-toggle " data-bs-toggle="dropdown" href="{{$name}}" class="signup"><button type="button" class="btns" id="banner-btn-1">{{ Session::get('user')['name'] }}</button></a>        
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/vendDash">Vendor Page</a>
                                    <a class="dropdown-item" href="/details">Details</a>
                                    <a class="dropdown-item" href="/post">Post</a>
                                    <a class="dropdown-item" href="/anyBooking">Booking</a>
                                    <a class="dropdown-item" href="/auction">Auction</a>
                                    <a class="dropdown-item">Status <span style="color:green";>(Approved)</span></a>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </div>
                            </div>
                            
                            <li class="nav-item">
                                    <a class="nav-link"  href="#"><i class="bi bi-bell-fill"></i></a>
                            </li>
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
        <script type="text/javascript">
            $(function() {
                $('#datetimepicker1').datetimepicker();
            });
</script>
<script>
            $(document).ready(function(){
             $('.owl-carousel').owlCarousel({
             loop:true,
             margin:20,
             autoplay:true,
             autoplayTimeout: 2000,
             autoplayHoverPause:true,
             nav:false,
             responsive:{
                 0:{
                     items:2
                 },
                 700:{
                     items:4
                 },
                 1000:{
                     items:4
                 }
             }
         });
     });
</script>
        {{ View::make('layout.footer') }}
    </body>
</html>