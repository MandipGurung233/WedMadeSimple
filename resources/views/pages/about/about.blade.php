@extends('pages.about.aboutMain')
@section('home')

<!--banner-->
<div class="header">     
    <div class="container">
        <div class="row justify-content-center slider-text align-items-center mt-6">
            <div class="col-md-6 col-lg-8 mt-10">
            <div class="text-center">
                <h1 class="mt-5" style="color: white;font-size:35px;">About WedMadeSimple</h1>
                <h1 id="bann"><a href="">Home</a>><a href="">About</a></h1>
            </div>
            </div>
        </div>   
    </div>
</div>

<!--2nd section-->
<section class="ftco-section ftco-no-pb" style="padding-bottom: 0px; padding-top: 96px;">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(/image/about/aboutBanner1.jpg);"></div>
        <div class="col-md-6 wrap-about py-md-5">
          <div class="heading-section p-md-5">
            <h2 class="mb-4" 
            style=" color: black;
            font-size: 30px;
            font-weight: bolder;">We put People First</h2>
            <p style="font-size: 17px;text-align:justify;">A small river named Duden flows by ther named Duden flows by ther named Duden flows by ther named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth s of sentences fly into your mouth s of sentences fly into your mouth s of sentences fly into your mouth.</p>
            </div>
        </div>
      </div>
    </div>
</section>


    <!--3rd section-->
    <div class="container-fluid">

        <div class="row justify-content-evenly" id="sec">

            <div class="col-md-5 col-10" id="sectxt">
                 <h1>In what We believe</h1>
            
                <div class="aboutButton as">
                    <button class="btn mt-3" id="btnMiss"><span class="sth">Our Mission</span></button>
                    <button type="button" class="btn mt-3" id="btnVis"><span class="sth">Our Vision</span></button>
                    <button type="button" class="btn mt-3" id="btnVal"><span class="sth">Our Values</span></button>
                </div> 
                <div id="content">
                    <p>The cyber threat prospect is constantly increasing. Majority of the companies are not well armed with cyber security tools hence,resulting into successful breaches. <br><br> Our cyber security solutions are tailored to focus on all the possible cyber-attack surfaces your organization might have. tailored applicationyour tailored application tailored applicationyour tailored application</p>
                </div>
            </div>

            <div class="col-md-5 d-none d-md-block secimgs">
                <img src="/image/about/aboutBanner2.jpg" alt="" class="img-fluid">
            </div>

            
        </div>
    </div>
@endsection
