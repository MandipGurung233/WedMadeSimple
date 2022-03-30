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
                                        $veEmail = $notification->data['venEmail'];    
                                        $find = Approved::where(['email'=>$veEmail])->first();
                                        $vendName = $find->name;
                                        ?>
                                        <p class="dropdown-item" href=""> <b>{{$vendName}}</b><br>cancelled your booking<br>
                                        <a href="{{ route('markasread', $notification->id)}}" style="color:red;text-decoration:underline;">Mark as read</a>
                                        </p>                                                                                       
                                    @endforeach
                                    
                                </div>
                            </div>
                            
                            <div class="dropdown">
                                
                                <a class="dropdown-toggle " data-bs-toggle="dropdown" href="{{$name}}" class="signup"><button type="button" class="btns" id="banner-btn-1">{{ Session::get('user')['name'] }}</button></a>        
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/bookingHistory">Booking Details</a>
                                    <a class="dropdown-item" href="/newsFeed">NewsFeed</a>
                                    <a class="dropdown-item" href="/payment">Payment</a>
                                    <a class="dropdown-item" href="#">Status | <span style="color:green">Pending</span></a>
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
   
<br><br>
<?php
        $value = $amount;
        
        $value1 = $value / 2;
?>
<div class="container">    
                <div class="row pt-2 justify-content-center">
                    <div class="col-md-4">
                        @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <br>
                        <h5>Powered By:</h5>
                        <img src="/image/Book/Khalti logo.png" alt="image" class="img-fluid">
                       
                            <div class="form-group pt-3">
                                <button  id="payment-button" class="btn btn-danger mb-5">Advance Payment</button>              
                            </div>                                         
                    </div>  
                    <div class="col-md-7">
                        <form>
                            <div class="form-group pt-3">
                                <h6 style="font-weight:550px;">Total Payment</h6>
                                <input type="text" class="form-control" placeholder= ' Nrs {{$value}}'>
                                <br>
                                <h6 style="font-weight:550px;">Advance Payment (50 %)</h6> 
                                <input type="text" class="form-control" placeholder= ' Nrs {{$value1}}'>
                                <br>
                                 
                            </div>
                        </form>
                    </div>                
                </div>
</div>
<br><br>
    {{ View::make('layout.footer') }}
   <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_7d1e222d9bec48cf92d19e0e744ca8e2",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    $.ajax({
                            type : 'POST',
                            url : "{{ route('khalti.verifyPayment') }}",
                            data: {
                                token : payload.token,
                              
                                amount : payload.amount,
                                "_token" : "{{ csrf_token() }}"
                            },
                            success : function(res){
                                $.ajax({
                                    type : "POST",
                                    url : "{{ route('khalti.storePayment') }}",
                                    data : {
                                        response : res,
                                       
                                        "_token" : "{{ csrf_token() }}"
                                    },
                                    success: function(res){
                                        console.log('transaction successfull');
                                    }
                                });
                                console.log(res);
                            }
                        });
                        
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>
</body>
</html>
