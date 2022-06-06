@extends('pages.dashboard.vendor.vendorMain')
@section('home')
<section>
    <div class="container login">
        <div class="row justify-content-center llogin">
            
            <div class="col-md-9">
                        <h2 class="form-title1">Please upload your post </h2>
                        <?php
                        if(Session::has('user')){
                            $emails=Session::get('user')['email'];
                        }?>
                        <form action="{{ url('vendorPost/'.$emails) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @if (session('status'))
                                <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="form-group1">
                                <label for="your_name" class="labels"><span style="color:#6dabe4;"><i class="bi bi-person-fill"></i></span></label>
                                <input type="date" class="form-control inputs" name="uploadDate" id="your_name" placeholder="Enter the date"/>
                                <span style="color: red; font-size:12px;">@error('uploadDate'){{ $message }}@enderror</span>
                            
                            </div>
                      
                            <div class="form-group1">
                                    <p>Please Upload the image: </p>
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" class="form-control-file" name="imgFile" id="exampleFormControlFile1">
                                    <br>
                                    <span style="color: red; font-size:12px;">@error('imgFile'){{ $message }}@enderror</span>
                            </div>
                        
                            <div class="form-group1">
                                <label for="your_name" class="form-label labels"><span style="color:#6dabe4;"></span></label>   
                                <textarea type="text" class="form-control inputs" name="caption" placeholder="Write Caption" id ="your_name" rows="4"></textarea> 
                                <span style="color: red; font-size:12px;">@error('caption'){{ $message }}@enderror</span>   
                            </div>
                                 
                            <div class="form-group1 form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit1" value="Upload"/>
                            </div>
                            
                        </form>
            </div>
        </div>
    </div>
</section>
@endsection
