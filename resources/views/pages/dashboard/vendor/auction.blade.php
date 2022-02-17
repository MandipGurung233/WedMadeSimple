@extends('pages.dashboard.vendor.vendorMain')
@section('home')
<?php
    use App\Models\Approved;
    $value = Approved::all();
    $betting = array();
    foreach ($value as $item){
        $bettingg = '';
        $bettings = $item->value;
        if (!$bettings){
            $bettingg = '0';
            array_push($betting, $bettingg);
        } else{
            array_push($betting, $bettings);
        }
        
        $mail = Session::get('user')['email']; 
        $mail1 = $item->email;
        if ($mail == $mail1){
            $enteredValue = $item->value;
        }
    }
    rsort($betting);

    
?>
<section>
    <div class="container login">
        <div class="row justify-content-center llogin">
            
            <div class="col-md-9">
                        <h2 class="form-title1">Be featured !! | <span style="font-size:15px;">Auction Price: Nrs 5000</span></h2>
                        <h2 class="form-title1" style="font-size:14px">Top three auctioned price: {{$betting[0]}}, {{$betting[1]}}, {{$betting[2]}}</h2>
                        <?php
                        if(Session::has('user')){
                            $emails=Session::get('user')['email'];
                        }?>

                        <form action="{{ url('auction/'.$emails) }}" method="POST">
                            @csrf
                            @if (session('status'))
                                <h6 style="font-size:12px;" class="alert alert-success">{{ session('status') }}</h6>
                            @endif

                            <div class="form-group1">
                                <label for="your_name" class="labels"><span style="color:#6dabe4;"><i class="bi bi-person-fill"></i></span></label>
                                <input type="number" class="form-control inputs" name="bet" id="your_name" placeholder="Enter your price"/>
                                <span style="color: red; font-size:12px;">@error('bet'){{ $message }}@enderror</span>
                            
                            </div>
                            <h2 class="form-title1" style="font-size:14px">Your entered Price: {{$enteredValue}}</h2>
                           
                            <div class="form-group1 form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit1" value="Auction"/>
                            </div>
                            
                        </form>
            </div>
        </div>
    </div>
</section>
@endsection