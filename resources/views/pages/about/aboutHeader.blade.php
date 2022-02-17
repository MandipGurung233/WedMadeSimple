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
<header>
    <!--Top Navbar-->
    <div class="first-nav">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                
                <div class="first-nav-left col-12 col-md-5 text-sm-center texts">
                    <span class="phone">
                        <a href="#">
                            <i class="bi bi-telephone-fill"></i> 984 046 5291
                        </a>
                    </span>
                    <span>
                        <a href="#">
                            <i class="bi bi-envelope"></i> info@wedmadesimple.com
                        </a>
                    </span>
                </div>

                <div class="first-nav-right col-12 col-md-5 text-sm-center text">
                    <span>
                        <span class="nav-icon">
                            <a target="_blank" href="https://facebook.com/eratechnepal"><i class="bi bi-facebook"></i></a>
                        </span>
                        <span class="nav-icon">
                            <a target="_blank" href="https://www.linkedin.com/company/eratech-nepal/"><i class="bi bi-linkedin"></i></a>
                        </span>
                        <span class="nav-icon">
                            <a target="_blank" href="https://wa.me/9779848065866?text=I+have+an+idea+about%3F"><i class="bi bi-whatsapp"></i></a>
                        </span>
                        <span class="nav-icon">
                            <a target="_blank" href="https://instagram.com/eratechnepal"><i class="bi bi-instagram"></i></a>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>

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
                                <a class="nav-link active" aria-current="page" href="/about">About</a>  
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
                            <li class="nav-item">
                                <a class="nav-link"  href="{{$name}}"> {{ Session::get('user')['name'] }}</a>
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
