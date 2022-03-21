@extends('pages.dashboard.vendor.vendorMain')
@section('home')
<?php
    use App\Models\bookDetail;
    use App\Models\User;
    $value = bookDetail::all();
?>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5> Pending booking
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>bookDate</th>                              
                                <th>Service type</th>                           
                        </thead>
                        <tbody>
                        @foreach ($value as $item)
                            <?php
                                $mail=Session::get('user')['email'];
                                $mail1 = $item->venEmail;
                            
                                if ($mail == $mail1)
                                {
                                    $custMail = $item->email;
                                    $find = User::where(['email'=>$custMail])->first();
                                    $userName = $find->name;
                                    $userAddress = $find->address;
                                    $userMail = $find->email;
                                    $book_date = $item->bookDate;
                                    $service = $item->service;                   
                                } else{
                                 
                                    $userName = 'N\A';
                                    $userAddress = 'N\A';
                                    $userMail = 'N\A';
                                    $book_date = 'N\A';
                                    $service = 'N\A';
                         
                                }
                            ?>
                            @if ($mail == $mail1)
                                <tr class="heading-value">
                                    <td>{{ $userName}}</td>
                                    <td>{{ $userAddress}}</td>
                                    <td>{{ $userMail}}</td>
                                    <td>{{ $book_date}}</td>
                                    <td>{{ $service}}</td>
                            
                                    <td>
                                        <form action="{{ url('destroyed/'.$item->id) }}" method="POST">
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