@extends('pages.service.serviceMain')
@section('home')
<!--banner-->
<div class="header">     
    <div class="container">
        <div class="row justify-content-center slider-text align-items-center mt-6">
            <div class="col-md-6 col-lg-8 mt-10">
            <div class="text-center">
                <h1 class="mt-5" style="color: white;font-size:35px;">Services we offer</h1>
                <h1 id="bann"><a href="/">Home</a>><a href="">Service</a></h1>
            </div>
            </div>
        </div>   
    </div>
</div>

<!--Category-->
<div class="container pb-3" style="margin-top: 40px">
    <div class="row">
        <div class="col-xl-5   popular-title">
            <span class="trend mb-2">Category</span>
            <h4>Find the best vendor</h4>
        </div>
    </div>
</div>

<!--category-->
<div class="container">
    <div class="row justify-content-evenly" id="category">
        <div class="col-md-12 col-10" id="categorytxt">
            <div class="row justify-content-evenly" id="categoryRow1">
                 <a href="/makeUp">
                    <div class="col-md-5" id="categoryCol1">
                        <div class="row justify-content-evenly">
                            <div class="col-md-5" id="categorytxt">
                                <h5>Makeup</h5>
                                <p>Bridal Makeup / Groom Makeup / ...</p>
                            </div>
                            <div class="col-md-5 img1 d-none d-md-block">
                            </div>  
                        </div>
                    </div>
                 </a>

                <a href="/venue">
                    <div class="col-md-5" id="categoryCol1" style="background-color: rgb(223, 178, 173);">
                        <div class="row justify-content-evenly">
                            <div class="col-md-5" id="categorytxt">
                                <h5>Venue</h5>
                                <p>Banquet hall / Lawns / Party Palace...</p>
                            </div>
                            <div class="col-md-5 img2 d-none d-md-block">
                            </div>  
                        </div>
                    </div> 
                </a>   
            </div>
            <div class="row justify-content-evenly" id="categoryRow1">
                <a href="/photographer">
                    <div class="col-md-5" id="categoryCol1" style="background-color: rgb(207, 205, 184);">
                        <div class="row justify-content-evenly">
                            <div class="col-md-5" id="categorytxt">
                                <h5>Photographers</h5>
                                <p>Pre-Wedding / photoshoot / Video...</p>
                            </div>
                            <div class="col-md-5 img4 d-none d-md-block">
                            </div>  
                        </div>
                    </div>
                </a>

                <a href="/clothing">
                    <div class="col-md-5" id="categoryCol1" style="background-color: rgb(229, 211, 189);">
                        <div class="row justify-content-evenly">
                            <div class="col-md-5" id="categorytxt">
                                <h5>Clothing</h5>
                                <p>Suit / Lehenga / Gown / Coat...</p>
                            </div>
                            <div class="col-md-5 img3 d-none d-md-block">
                            </div>  
                        </div>
                    </div> 
                </a>   
            </div>        
        </div>   
    </div>
</div>


<!--fixed background-->
<div class="imagefix"> 
    <div class="container">
        
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center mb-5 mt-5">
                            <h2 style="color: black;
                            font-size: 30px;
                            font-weight: bolder;
                            ">Book a vendor in most simplest way</h2>
                        </div>
                    </div>
              
                    <div class="row justify-content-evenly service1 d-flex mt-0">
                        <div class="col-md-3 d-flex align-self-stretch">
                            <div class="d-block text-center">
                                <div class=" d-flex justify-content-center align-items-center mt-3">
                                    <h1><i class="bi bi-card-heading"></i></h1>
                                </div>
                                <div class="py-md-4">
                                    <h3>Register</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex align-self-stretch">
                            <div class="d-block text-center">
                                <div class=" d-flex justify-content-center align-items-center mt-3">
                                    <h1><i class="bi bi-search"></i></h1>
                                </div>
                                <div class="py-md-4">
                                    <h3>Browse vendor</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex align-self-stretch">
                            <div class="d-block text-center">
                                <div class=" d-flex justify-content-center align-items-center mt-3">
                                    <h1><i class="bi bi-journal-check"></i></h1>
                                </div>
                                <div class="py-md-4">
                                    <h3>Book vendor</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>     
</div>

@endsection
