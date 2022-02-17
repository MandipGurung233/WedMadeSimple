@extends('pages.contact.contactMain')
@section('home')
<!--banner-->
<div class="header">     
    <div class="container">
        <div class="row justify-content-center slider-text align-items-center mt-6">
            <div class="col-md-6 col-lg-8 mt-10">
            <div class="text-center">
                <h1 class="mt-5" style="color: white;font-size:35px;">Have a Question ?</h1>
                <h1 id="bann"><a href="/">Home</a>><a href="/contact">Contact</a></h1>
            </div>
            </div>
        </div>   
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center" id="contact">
        <div class="col-md-5 col-10" id="contacttxt">

            <div class="row justify-content-center" id="contactRow1">
                <div class="col-md-12" id="contactCol1">
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center img">
                            <i class="bi bi-geo-alt iconned"></i>
                        </div>
                        <div class="col-md-7 text-center" id="contacttxt">
                            <h4>Company Address</h4>
                            <p>Itahari - 5</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" id="contactRow1">
                <div class="col-md-12" id="contactCol1">
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center img">
                            <i class="bi bi-envelope iconned"></i>
                        </div>
                        <div class="col-md-7 text-center" id="contacttxt">
                            <h4>Company Email</h4>
                            <a href="#"><p class="email">info@wedMadeSimple.com</p></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" id="contactRow1">
                <div class="col-md-12" id="contactCol1">
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center img">
                            <i class="bi bi-telephone iconned"></i>
                        </div>
                        <div class="col-md-7 text-center" id="contacttxt">
                            <h4>Call Us !</h4>
                            <p>025-550678</p>
                        </div>
                    </div>
                </div>
            </div>
  
        </div>
        <div class="col-md-5 col-10" id="contactright">
            <h3>Get In Touch</h3>
            <form action="/contact" method="POST">
                @csrf
                @if (session('status'))
                    <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                @endif
            <div class="form">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control space space1" id="exampleFormControlInput1" placeholder="Name">
                        <span style="color: red; font-size:12px;">@error('name'){{ $message }}@enderror</span>
                 
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="number" class="form-control space" id="exampleFormControlInput1" placeholder="Number">
                        <span style="color: red; font-size:12px;">@error('number'){{ $message }}@enderror</span>
                 
                    </div>
                </div>

                <div class="mb-5">
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <span style="color: red; font-size:12px;">@error('email'){{ $message }}@enderror</span>
                 
                </div>
                <div class="mb-5">
                    <textarea class="form-control formcontrol" id="exampleFormControlInput1" name="comment" rows="5" placeholder="Submit"></textarea>
                </div>
            </div>
            <button type="submit" class="btn" id="contactBtn">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
