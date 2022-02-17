@extends('pages.blog.blogMain')
@section('home')
<!--banner-->
<div class="header">     
    <div class="container">
        <div class="row justify-content-center slider-text align-items-center mt-6">
            <div class="col-md-6 col-lg-8 mt-10">
            <div class="text-center">
                <h1 class="mt-5" style="color: white;font-size:35px;">Latest Blog</h1>
                <h1 id="bann"><a href="/">Home</a>><a href="/blog">Blog</a></h1>
            </div>
            </div>
        </div>   
    </div>
</div>

<!--Blog-section-->
<div class="container-fluid" style="padding-bottom: 30px;">

    <div class="row justify-content-center" id="blog">
        <div class="col-md-4" id="blogtxt">
            <div class="bgImage bgImage1 img-fluid">
               
            </div>
            <div class="content">
                <h5 style="padding-bottom: 0px;">Why everyone is so offended</h5>
                <div class="row created">
                    <div class="col-md-5">
                        <h6 style="color:#4f074c; margin-bottom:20px;">by Aakash rai</h6>
                    </div>
                    <div class="col-md-5">
                        <h6  style="color:#4f074c; margin-bottom:20px;">19th july, 2021</h6>
                    </div>
                </div>
                <div class="row created">
                    <div class="col-md-12">
                        <h6>Strategy In Digital Marketing CompanyStrategy In Digital Marketing CompanyStrategy In Digital Marketing Company</h6>
                    </div>
                </div>
               
                <button type="button" class="btn mt-3" id="blog-btn">Read More</button>
            </div>   
        </div>

        <div class="col-md-4" id="blogtxt">
            <div class="bgImage bgImage2 img-fluid">
               
            </div>
            <div class="content">
                <h5 style="padding-bottom: 0px;">Why everyone is so offended</h5>
                <div class="row created">
                    <div class="col-md-5">
                        <h6 style="color:#4f074c; margin-bottom:20px;">by Aakash rai</h6>
                    </div>
                    <div class="col-md-5">
                        <h6  style="color:#4f074c; margin-bottom:20px;">19th july, 2021</h6>
                    </div>
                </div>
                <div class="row created">
                    <div class="col-md-12">
                        <h6>Strategy In Digital Marketing CompanyStrategy In Digital Marketing CompanyStrategy In Digital Marketing Company</h6>
                    </div>
                </div>
               
                <button type="button" class="btn mt-3" id="blog-btn">Read More</button>
            </div>   
        </div>

        <div class="col-md-4" id="blogtxt">
            <div class="bgImage bgImage3 img-fluid">
               
            </div>
            <div class="content">
                <h5 style="padding-bottom: 0px;">Why everyone is so offended</h5>
                <div class="row created">
                    <div class="col-md-5">
                        <h6 style="color:#4f074c; margin-bottom:20px;">by Aakash rai</h6>
                    </div>
                    <div class="col-md-5">
                        <h6  style="color:#4f074c; margin-bottom:20px;">19th july, 2021</h6>
                    </div>
                </div>
                <div class="row created">
                    <div class="col-md-12">
                        <h6>Strategy In Digital Marketing CompanyStrategy In Digital Marketing CompanyStrategy In Digital Marketing Company</h6>
                    </div>
                </div>
               
                <button type="button" class="btn mt-3" id="blog-btn">Read More</button>
            </div>   
        </div>
    </div>
</div>
@endsection
