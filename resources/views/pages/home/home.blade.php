@extends('pages.home.homeMain')
@section('home')

<div class="header">   
    <div class="overlay"></div>  
    <div class="container">
      <!--banner-->
        <div class="row justify-content-center slider-text align-items-center mt-6">
            <div class="col-md-6 col-lg-8 mt-10">
            <div class="text text-center">
                <h1 class="mb-4" id="bann">And So<br>The adventure Begins</h1>
                <form action="/search" class="search-location mt-md-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 align-items-end">
                    <div class="form-group">
                        <div class="form-field">
                        
                        <input type="text" name="search" class="form-control" placeholder="Search City">
                        <button>
                                <i class="bi bi-search" id="nn"></i>
                        </button>
                        
                        </div>
                    </div>
                    </div>
                </div>
                </form>
            
            </div>
            </div>
        </div>

        <div class=" animate">
            
            <div class="animate-txt">Find the best Vendor with ratings</div>
                <ul class="animate-txts">
                    <li><span>Venue</span></li>
                    <li><span>Make-up</span></li>
                    <li><span>Clothing</span></li>
                    <li><span>Photographer</span></li>
                </ul>
            
            </div>
        </div>
    </div>
</div>
    


<!--featured-->
<div class="container">

    <div class="row justify-content-center" style="padding-top: 80px;">
        <div class="col-md-12 heading-section text-center mt-0">
            <span class="subheading mb-2">Featured Vendor</span>
            <h2>The Choice You Make</h2>
        </div>
    </div>

    <div class="row justify-content-center" id="feature">
        <a href="">
            <div class="col-md-3 text-center" id="featuretxt">
                <div class="container" id="feature-img1">                                                              
                                                        
                </div>
                <h5>Binita Make-up | <i class="bi bi-file-earmark-check-fill" style="color: green"></i></h5>
                <p>lorem ipsum dipsum dipsum dipsum lore mlorem lorem lorem lorem</p>
            </div>
        </a>

        <a href="">
            <div class="col-md-3 text-center" id="featuretxt">
                <div class="container" id="feature-img2">                                                              
                                                        
                </div>
                <h5>Perfect Photo | <i class="bi bi-file-earmark-check-fill" style="color: green"></i></h5>
                <p>lorem ipsum dipsum dipsum dipsum lore mlorem lorem lorem lorem</p>
            </div>
        </a>

        <a href="">
            <div class="col-md-3 text-center" id="featuretxt">
                <div class="container" id="feature-img3">                                                              
                                                        
                </div>
                <h5>Fashion | <i class="bi bi-file-earmark-check-fill" style="color: green"></i></h5>
                <p>lorem ipsum dipsum dipsum dipsum lore mlorem lorem lorem lorem</p>
            </div>
        </a>   
    </div>
</div>




      <!--Popular vendor-->
      <div class="container pb-5">
        <div class="row">
            <div class="col-xl-5   popular-title">
                <span class="trend mb-2">Popular</span>
                <h4>Trending vendor</h4>
            </div>
        </div>

        <div>
            <div class="row">
                <div class="container">
                    <div class="owl-carousel owl-theme owl-carousel-wrapper mt-2 pt-4">
                        <a href="" style="text-decoration: none;">
                            <div class="item popular-carousel-item pt-2">
                                <div class="container" id="popular-carousel-img1">                                                              
                                                     
                                </div>
                                <div class=" container popular-carousel-details">
                                    <ul>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <li><h6>Oceana Resort</h6></li>
                                            </div>
                                            <div class="col-md-6">
                                                <li class="star-rating">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span>(3)</span>
                                                </li>
                                            </div>
                                        </div>        
                                        <li><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Toptio excepturi distinctio aspernatur unde</p></li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                        <a href="" style="text-decoration: none;">
                            <div class="item popular-carousel-item pt-2">
                                <div class="container" id="popular-carousel-img2">                                                              
                                                     
                                </div>
                                <div class=" container popular-carousel-details">
                                    <ul>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <li><h6>Chandragiri</h6></li>
                                            </div>
                                            <div class="col-md-6">
                                                <li class="star-rating">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span>(3)</span>
                                                </li>
                                            </div>
                                        </div>        
                                        <li><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Toptio excepturi distinctio aspernatur unde</p></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                                               
                        <a href="" style="text-decoration: none;">
                            <div class="item popular-carousel-item pt-2">
                                <div class="container" id="popular-carousel-img3">                                                              
                                                     
                                </div>
                                <div class=" container popular-carousel-details">
                                    <ul>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <li><h6>Banjagiri</h6></li>
                                            </div>
                                            <div class="col-md-6">
                                                <li class="star-rating">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span>(3)</span>
                                                </li>
                                            </div>
                                        </div>        
                                        <li><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Toptio excepturi distinctio aspernatur unde</p></li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                        <a href="" style="text-decoration: none;">
                            <div class="item popular-carousel-item pt-2">
                                <div class="container" id="popular-carousel-img4">                                                              
                                                     
                                </div>
                                <div class=" container popular-carousel-details">
                                    <ul>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <li><h6>Darpan hotel</h6></li>
                                            </div>
                                            <div class="col-md-6">
                                                <li class="star-rating">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span>(3)</span>
                                                </li>
                                            </div>
                                        </div>        
                                        <li><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Toptio excepturi distinctio aspernatur unde</p></li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                        <a href="" style="text-decoration: none;">
                            <div class="item popular-carousel-item pt-2">
                                <div class="container" id="popular-carousel-img5">                                                              
                                                     
                                </div>
                                <div class=" container popular-carousel-details">
                                    <ul>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <li><h6>Kanxa palace</h6></li>
                                            </div>
                                            <div class="col-md-6">
                                                <li class="star-rating">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span>(3)</span>
                                                </li>
                                            </div>
                                        </div>        
                                        <li><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Toptio excepturi distinctio aspernatur unde</p></li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                        <a href="" style="text-decoration: none;">
                            <div class="item popular-carousel-item pt-2">
                                <div class="container" id="popular-carousel-img6">                                                              
                                                     
                                </div>
                                <div class=" container popular-carousel-details">
                                    <ul>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <li><h6>3 star palace</h6></li>
                                            </div>
                                            <div class="col-md-6">
                                                <li class="star-rating">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span>(3)</span>
                                                </li>
                                            </div>
                                        </div>        
                                        <li><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Toptio excepturi distinctio aspernatur unde</p></li>
                                    </ul>
                                </div>
                            </div>
                        </a>                       
                    </div>
                </div>
            </div>  
        </div>
    </div>

   

<!--Category-->
<div class="container pb-3">
    <div class="row">
        <div class="col-xl-5   popular-title">
            <span class="trend mb-2">Category</span>
            <h4>One Stop Solution</h4>
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

                <a href="/avaVend">
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
                <a href="/avaVend">
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

                <a href="/avaVend">
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


 <!--Succesful stories-->
 <div class="container pb-5">
    <div class="row">
        <div class="col-xl-5   success-title">
            <span class="trend mb-2">Stories</span>
            <h4>Real Wedding Stories</h4>
        </div>
    </div>

    <div>
        <div class="row">
            <div class="container">
                <div class="owl-carousel owl-theme owl-carousel-wrap mt-2 pt-2">
                    <a href="" style="text-decoration: none;">
                        <div class="item success-carousel-item pt-2">
                            <div class="container" id="success-carousel-img1">                                                              
                                                 
                            </div>
                            <div class=" container success-carousel-details">
                                <ul>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <li><h6 style="margin-top: 5px;">Milan Weds Rinna</h6></li>
                                        </div>
                                        <div class="col-md-6">
                                            <p>11 july, 2020</p>
                                        </div>
                                    </div>        
                                    <li><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Toptio excepturi distinctio aspernatur unde</p></li>
                                </ul>
                            </div>
                        </div>
                    </a>

                    <a href="" style="text-decoration: none;">
                        <div class="item success-carousel-item pt-2">
                            <div class="container" id="success-carousel-img3">                                                              
                                                 
                            </div>
                            <div class=" container success-carousel-details">
                                <ul>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <li><h6 style="margin-top: 5px;">Rishi Weds Rishu</h6></li>
                                        </div>
                                        <div class="col-md-6">
                                            <p>25 dec, 2030</p>
                                        </div>
                                    </div>        
                                    <li><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Toptio excepturi distinctio aspernatur unde</p></li>
                                </ul>
                            </div>
                        </div>
                    </a>
                                           
                    <a href="" style="text-decoration: none;">
                        <div class="item success-carousel-item pt-2">
                            <div class="container" id="success-carousel-img2">                                                              
                                                 
                            </div>
                            <div class=" container success-carousel-details">
                                <ul>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <li><h6 style="margin-top: 5px;">Paras Weds Bhumi</h6></li>
                                        </div>
                                        <div class="col-md-6">
                                            <p>20 jan, 2030</p>
                                        </div>
                                    </div>        
                                    <li><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Toptio excepturi distinctio aspernatur unde</p></li>
                                </ul>
                            </div>
                        </div>
                    </a>

                    <a href="" style="text-decoration: none;">
                        <div class="item success-carousel-item pt-2">
                            <div class="container" id="success-carousel-img4">                                                              
                                                 
                            </div>
                            <div class=" container success-carousel-details">
                                <ul>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <li><h6 style="margin-top: 5px;">Anish Weds Rima</h6></li>
                                        </div>
                                        <div class="col-md-6">
                                            <p>10 december, 2025</p>
                                        </div>
                                    </div>        
                                    <li><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Toptio excepturi distinctio aspernatur unde</p></li>
                                </ul>
                            </div>
                        </div>
                    </a>         
                </div>
            </div>
        </div>  
    </div>
</div>

<!--testimonial-->
<!--Testimony-->
    <div class="container" style="padding-bottom: 75px;">

        <div class="row justify-content-center" style="padding-top: 10px;">
            <div class="col-md-12 review-section text-center mt-0">
                <span class="reviews mb-2">Testimonial</span>
                <h2>Happy Clients</h2>
            </div>
        </div>

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="20000">
                    <div id="reviewRow1"> 
                           <div id="reviewCol1">
                               <div class="row justify-content-center">
                                    <div class="review1 ">
                                    </div>
                                    <div id="reviewtxt">
                                        <h5>Rishi Raj Shrestha</h5>
                                        <p><h6 style="color: grey;">IT-Professional</h6></p>
                                        <p class="reviewp">lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsumlorem ipsum dipsumlorem ipsum dipsumlorem ipsum dipsumlorem ipsum dipsum</p>
                                    </div>         
                               </div>
                           </div>                    
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="20000">
                    <div id="reviewRow1"> 
                           <div id="reviewCol1">
                               <div class="row justify-content-center">
                                    <div class="review2 ">
                                    </div>
                                    <div id="reviewtxt">
                                        <h5>Paras Mani Rai</h5>
                                        <p><h6 style="color: grey;">IT-Expert</h6></p>
                                        <p class="reviewp">lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsumlorem ipsum dipsumlorem ipsum dipsumlorem ipsum dipsumlorem ipsum dipsum</p>
                                    </div>         
                               </div>
                           </div>                    
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="20000">
                    <div id="reviewRow1"> 
                           <div id="reviewCol1">
                               <div class="row justify-content-center">
                                    <div class="review3 ">
                                    </div>
                                    <div id="reviewtxt">
                                        <h5>Diamond rana</h5>
                                        <p><h6 style="color: grey;">IT-Expert</h6></p>
                                        <p class="reviewp">lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsum lorem ipsum dipsumlorem ipsum dipsumlorem ipsum dipsumlorem ipsum dipsumlorem ipsum dipsum</p>
                                    </div>         
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
</section>
@endsection