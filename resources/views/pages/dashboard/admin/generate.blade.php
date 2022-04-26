<?php
    use App\Models\contact;
    use App\Models\bookDetail;
    use App\Models\Approved;
    $contact = contact::all();
    $books = bookDetail::all();
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
                        <a href="/export" name="export" class="btn btn-primary float-end repo" style="margin-right:40px">Generate .csv</a>
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
                        <a href="/exportBook" name="export" class="btn btn-primary float-end repo" style="margin-right:40px">Generate .csv</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>id</th>
                                <th>bookDate</th>
                                <th>service</th>
                                <th>venEmail</th>
                                <th>email</th>
                                <th>comment</th>
                                <th>paid</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($books as $item)
                            <tr class="heading-value">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->bookDate }}</td>
                                <td>{{ $item->service }}</td>
                                <td>{{ $item->venEmail }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->comment }}</td>
                                <td>{{ $item->paid }}</td>
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
                    <a href="/exportContact" name="export" class="btn btn-primary float-end repo" style="margin-right:40px">Generate .csv</a>
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
                                <th>Reply</th>
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
                                <td>{{ $item->reply }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="{{ url('replyContact/'.$item->email) }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Reply</button>
                                    </form>
                                </td>
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