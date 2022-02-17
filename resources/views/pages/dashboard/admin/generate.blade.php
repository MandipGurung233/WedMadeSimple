<?php
    use App\Models\venue;
    use App\Models\contact;
    $contact = contact::all();
    use App\Models\Approved;
    $venue = venue::all();
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
                    <h4> Approved vendors
                        <a href="#" class="btn btn-primary float-end repo" >Download</a>
                        <a href="#" class="btn btn-primary float-end repo" style="margin-right: 40px">Generate .csv</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>id</th>
                                <th>name</th>
                                <th>address</th>
                                <th>email</th>
                                <th>vendorType</th>
                                <th style="max-width: 50px!important;">file</th>
                                <th>value</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   $approve = Approved::all(); ?>
                            @foreach ($approve as $item)
                            <tr class="heading-value">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->vendorType }}</td>
                                <td>{{ $item->file }}</td>
                                <td>{{ $item->value }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4> Booking Details
                        <a href="#" class="btn btn-primary float-end repo" >Download</a>
                        <a href="#" class="btn btn-primary float-end repo" style="margin-right: 40px">Generate .csv</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>id</th>
                                <th>Vendor name</th>
                                <th>address</th>
                                <th>email</th>
                                <th>Date</th>
                                <th>vendorType</th>
                                <th style="max-width: 50px!important;">file</th>
                                <th>value</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($venue as $item)
                            <tr class="heading-value">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->vendorType }}</td>
                                <td>{{ $item->file }}</td>
                                <td>{{ $item->value }}</td>
                                <td>{{ $item->created_at }}</td>
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


<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4> Contact Details
                        <a href="#" class="btn btn-primary float-end repo" >Download</a>
                        <a href="#" class="btn btn-primary float-end repo" style="margin-right: 40px">Generate .csv</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>id</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($contact as $item)
                            <tr class="heading-value">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->comment }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="{{ url('deleteContact/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
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