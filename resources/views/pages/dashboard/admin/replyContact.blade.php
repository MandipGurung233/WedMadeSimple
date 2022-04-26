@extends('pages.dashboard.admin.adminMain')
@section('home')
<br><br>
<div class="container login">    
                <div class="row justify-content-center llogin pt-2">

                        <?php
                            $custEmail = $email;
                        ?>

                
        
                        <div class="col-md-9">
                          
                            <form action="{{ url('replyAdmin/'.$custEmail) }}" method="POST">
                                @csrf
                                @if (session('status'))
                                    <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                                @endif
                                <div class="form-group1 pt-3" style="">
                                     <textarea type="text" class="form-control" name="reply" placeholder="Write your reply" rows="4"></textarea>
                                     <span style="color: red; font-size:12px;">@error('reply'){{ $message }}@enderror</span>
                                     <br><br>
                                    <input type="submit" class="btn btn-success mb-5" id="submit" value="Reply"/>
                                </div> 
                            </form>     
                        </div>
     
                </div>
            </div>
@endsection