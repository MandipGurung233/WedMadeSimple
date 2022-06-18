@extends('pages.dashboard.customer.customerMain')
@section('home')
<br><br>
<div class="container login">    
                <div class="row justify-content-center llogin pt-2">

                        <?php
                            $email = Session::get('user')['email'];
                            $custEmail = $email;
                        ?>

                
        
                        <div class="col-md-9">
                          
                            <form action="{{ url('shareCustomer/'.$custEmail) }}" method="POST">
                                @csrf
                                @if (session('status'))
                                    <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                                @endif
                                <div class="form-group1 pt-3" style="">
                                     <textarea type="text" class="form-control" name="share" placeholder="Please write the email to which you want to share" rows="4"></textarea>
                                     <span style="color: red; font-size:12px;">@error('share'){{ $message }}@enderror</span>
                                     <br><br>
                                    <input type="submit" class="btn btn-success mb-5" id="submit" value="Share"/>
                                </div> 
                            </form>     
                        </div>
     
                </div>
            </div>
@endsection