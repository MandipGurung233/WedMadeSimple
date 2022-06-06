<?php
    use App\Models\Follow;
    use App\Models\Post;
    use App\Models\Approved;
    $allApprove = Approved::all();
    $newsfeed = Post::all();
    $follow = Follow::all();
?>
@extends('pages.dashboard.customer.customerMain')
@section('home')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-xl-5   success-title">
            <span class="trend mb-2">Activities</span>
            <h4>Latest Post</h4>
        </div>
    </div>

    <br>
    <div class="row justify-content-center">
        @foreach ($newsfeed as $item)
            <?php
                $userEmail=Session::get('user')['email'];
                $userFollowing = 'N\A';
                $emailed = $item->sessionEmail;
                $vendorFollowing = array();
                foreach($follow as $following){
                    $userFollowing = $following->userEmail;
                    if ($userEmail == $userFollowing){
                        $vendorFollowings = $following->followedVendor;
                        array_push($vendorFollowing, $vendorFollowings);
                    }
                }
            ?>

            @if (in_array($emailed, $vendorFollowing))
                <?php
                    $emailed = $item->sessionEmail;
                    foreach($allApprove as $approved){
                        $type = $approved->email;
                        if ($emailed == $type){
                            $vendorName = $approved->name;
                            break;
                        }
                    }
                ?>
                <div class="col-md-3">
            
                    <div class="row justify-content-center">
                                    <div class="col-md-10">
                                                <div class="container"> 
                                                <img id="success-carousel-img1" src ="{{ asset('uploads/postImg/'.$item->imgFile) }}" alt="image">                                                            
                                                                                                                     
                                                    <p>{{$item->created_at}}</p> 
                                                      
                                                </div>
                                             
                                                <div class=" container success-carousel-details">
                                                    <ul>
                                                        <div class="row mt-3">
                                                            <div class="col-md-11">
                                                            <p>{{$vendorName}}</p>
                                                                <p>{{$item->caption}}</p>
                                                                
                                                              
                                                            </div>
                                                        </div>        
                                                        <li>
                                                            <a href="/indereni"> 
                                                                <button type="button" class="btn" id="blog-btn">Share</button>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div> 
                                    </div>
                    </div>
                </div>
            @endif
        @endforeach
        

   
    </div>
</div>
<br><br>
@endsection