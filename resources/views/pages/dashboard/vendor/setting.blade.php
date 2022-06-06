<?php
use App\Models\Approved;
$approved = Approved::all();
?>

@extends('pages.dashboard.vendor.vendorMain')
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
                                <th>Password</th>
                                <th>Description</th>
                                <th>Image file</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($approved as $item)
                                <?php
                                $currentUser = Session::get('user')['email'];
                                $emm = $item->email;
                               
                                ?>
                               @if ($emm == $currentUser)
                                    <tr class="heading-value">
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$item->password}}</td>
                                        <td>{{ $item->description}}</td>
                                        <td>{{ $item->img }}</td>
                                        <td>
                                            <a href="{{ url('editInfo/'.$item->id) }}" class="btn btn-primary btn-sm">Update</a>
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