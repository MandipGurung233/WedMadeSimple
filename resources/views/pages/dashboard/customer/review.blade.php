<?php
    use App\Models\Review;
    use App\Models\Rating;
    use App\Models\Approved;
    $review = Review::all();
    $rating = Rating::all();
?>
@extends('pages.dashboard.customer.customerMain')
@section('home')
<?php
    $currentUser = Session::get('user')['email'];
?>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Reviewed
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>Name</th>
                                <th>Reviewed Vendor</th>
                                <th>Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $name = "Make Up";
                            ?>
                            @foreach ($review as $item)
                                @if ( $item->userEmail == $currentUser)
                                    @php
                                        $i = $item->vendorEmail
                                    @endphp    
                                
                                    <?php
                                        $find = Approved::where(['email'=>$i])->first();
                                        $names = $find->name;
                                    ?>
                                    <tr class="heading-value">
                                        <td>{{$names}}</td>
                                        <td>{{ $item->vendorEmail }}</td>
                                        <td>{{ $item->review }}</td>
                                        <td>
                                            <form action="{{ url('destroyReview/'.$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Rated
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>Name</th>
                                <th>Rated Vendor</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($rating as $item)
                                @if ( $item->userEmail == $currentUser)
                                    @php
                                        $i = $item->vendorEmail
                                    @endphp    
                                
                                    <?php
                                        $find = Approved::where(['email'=>$i])->first();
                                        $names = $find->name;
                                    ?>
                                    <tr class="heading-value">
                                        <td>{{$names}}</td>
                                        <td>{{ $item->vendorEmail }}</td>
                                        <td>{{ $item->rating }}</td>
                                        <td>
                                            <form action="{{ url('destroyRating/'.$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
</div>
<br><br>
@endsection