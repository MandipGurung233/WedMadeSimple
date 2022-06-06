<?php
use App\Models\User;
$user = User::all();
?>
@extends('pages.dashboard.customer.customerMain')
@section('home')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Your Personal information
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>Name</th>
                                <th>Address</th>
                          
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($user as $item)
                                <?php
                                $currentUser = Session::get('user')['email'];
                                $emm = $item->email;
                               
                                ?>
                               @if ($emm == $currentUser)
                                    <tr class="heading-value">
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->address}}</td>
                                     
                                       
                                        <td>
                                            <a href="{{ url('editCustomer/'.$item->id) }}" class="btn btn-primary btn-sm">Update</a>
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