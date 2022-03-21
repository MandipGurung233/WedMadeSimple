@extends('pages.dashboard.customer.customerMain')
@section('home')
<?php
    use App\Models\bookDetail;
    use App\Models\Approved;
    use App\Models\User;
    $value = bookDetail::all();
    
?>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <br>
                @if (session('status'))
                  <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <br>
                <div class="card-header">
                    <h5> Your booking information
                    </h5>
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                             
                                <th>Name</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>bookDate</th>
                                <th>Service</th>
                              
                        </thead>
                        <tbody>
                        @foreach ($value as $item)
                            <?php
                                $mail=Session::get('user')['email'];
                               
                                $mail1 = $item->email;
                            
                                if ($mail == $mail1)
                                {
                                  
                                    $book_date = $item->bookDate;
                                    $service = $item->service;
                                    $veEmail = $item->venEmail;
                                    $find = Approved::where(['email'=>$veEmail])->first();
                                    $vendName = $find->name;
                                    $vendAddress = $find->address;
                                    $vendType = $find->vendorType;
                                } else{
                                 
                                    $book_date = 'N\A';
                                    $service = 'N\A';
                                    $veEmail = 'N\A';
                                    $vendName = 'N\A';
                                    $vendAddress = 'N\A';
                                    $vendType = 'N\A';
                                }
                            ?>
                            @if ($mail == $mail1)
                                <tr class="heading-value">
                                  
                                    
                                    <td>{{ $vendName }}</td>
                                    <td>{{ $vendAddress }}</td>
                                    <td>{{ $vendType }}</td>
                                    <td>{{ $book_date }}</td>
                                    <td>{{ $service }}</td>
                                    
                                    <td>
                                        <form action="{{ url('cancel/'.$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
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