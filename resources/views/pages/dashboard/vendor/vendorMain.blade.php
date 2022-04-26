<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <link rel="stylesheet" href="css/vendorRegister/vendor.css">
        <link rel="stylesheet" href="css/vendorPage/makeUp/makeUp.css">
        <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
       
        <script type="text/javascript" src="{{ asset('js/vendor/makeUp/makeUp.js') }}" defer></script>
    </head>
    <body>
<header>
    <!--Top Navbar-->
    <?php 
use App\Http\Controllers\logging;
use App\Models\User;
use App\Models\Approved;
$approvedOne = Approved::all();
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
                                <a class="dropdown" data-bs-toggle="dropdown" href="#" class="signup"><button type="button" class="btns" id="banner-btn-1"><i class="bi bi-bell-fill" style="color:white;"></i><span style="color:red;"> {{$user1->unreadNotifications->count()}}</span></button></a>        
                                <div class="dropdown-menu">
                                    @foreach($user1->unreadNotifications as $notification)   
                                        <?php
                                    
                                        $custEmail = $notification->data['email']; 
                                        $name=Session::get('user')['email'];
                                        if ($custEmail == $name){
                                            $email = $notification->data['customerMail']; 
                                            $find = User::where(['email'=>$email])->first();
                                            $custName = $find->name;   
                                        }
                                        ?>
                                        @if ($custEmail == $name)
                                            <p class="dropdown-item" href=""> <b>{{$custName}}</b><br>has booked you<br>
                                            <a href="{{ route('mark_as_read', $notification->id)}}" style="color:red;text-decoration:underline;">Mark as read</a>
                                            </p>                                        
                                        @endif
                                                                                                                              
                                    @endforeach                                   
                                </div>
                            </div>
                            
                            <div class="dropdown">
                                <a class="dropdown-toggle " data-bs-toggle="dropdown" href="{{$name}}" class="signup"><button type="button" class="btns" id="banner-btn-1">{{ Session::get('user')['name'] }}</button></a>        
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/vendDash">Vendor Page</a>
                                    <a class="dropdown-item" href="/details">Details</a>
                                    <a class="dropdown-item" href="/post">Post</a>
                                    <a class="dropdown-item" href="/anyBooking">Booking</a>
                                    <a class="dropdown-item" href="/auction">Auction</a>
                                    <a class="dropdown-item" href="/vendorExport" name="export" class="btn btn-primary float-end repo" style="margin-right:40px; color:red; font-weight:600;">Booked Details .CSV</a>
                                    <?php
                                        $valued = array();
                                        foreach ($approvedOne as $app){
                                            $value2 = '';
                                            $value1 = $app->value;
                                            if (!$value1){
                                                $value2 = '0';
                                                array_push($valued, $value2);
                                            } else{
                                                array_push($valued, $value1);
                                            }
                                        }
                                        rsort($valued);
                                        $valued1 = array();
                                        for ($x = 0; $x <= 0; $x++) {
                                            array_push($valued1, $valued[$x]);
                                        }
                                        $vv = 'N\A';
                                        $vvv = 'N\A';
                                        $name=Session::get('user')['email'];
                                        $find = Approved::where(['email'=>$name])->first();                           
                                        $vv = $find->value;
                                        $vvv = $find->id;
                                        $paid = $find->paid;
                                    ?>
                                      
                                   
                                    @if (in_array($vv, $valued1))
                                        @if ($paid != 1)
                                        <a class="dropdown-item" href="{{ url('vendorPayment/'.$vvv) }}"><span style="color:red;font-weight:600;">Advance pay</span></a>                
                                        @else
                                        <a class="dropdown-item" href=""><span style="color:red;font-weight:600;">Advance paid</span></a>              
                                        @endif
                                    @endif
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