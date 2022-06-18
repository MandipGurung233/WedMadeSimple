<?php
    use App\Models\Distance;
    $dist = Distance::all();
?>
@extends('pages.dashboard.admin.adminMain')
@section('home')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <h4>Calculating distance between vendor address and customer address
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>ID</th>
                                <th>Customer Email</th>
                                <th>Customer address</th>
                                <th>Vendor Email</th>
                                <th>Vendor address</th>
                                <th>Distance (KM)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dist as $distance)
                       
                                        <tr class="heading-value">
                                        <td>{{ $distance->id }}</td>
                                            <td>{{ $distance->email }}</td>
                                            <td>{{ $distance->custAddress }}</td>
                                            <td>{{ $distance->vendorEmail }}</td>
                                            <td>{{ $distance->vendAddress}}</td>
                                            <td>{{ $distance->calculatedDistance}}</td>
                                            <td>
                                                <a href="{{ url('enterDistance/'.$distance->id) }}" class="btn btn-primary btn-sm">Enter distance</a>
                                            </td>
                                        </tr>

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