@extends('pages.dashboard.vendor.vendorMain')
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
                    <h5> Pending booking
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>id</th>
                                <th>fullName</th>
                                <th>phone</th>
                                <th>bookDate</th>
                                <th>place</th>
                                <th>flexRadio</th>
                                <th>venEmail</th>
                                <th>custEmail</th>
                                <th>created_at</th>
                        </thead>
                        <tbody>
                          
                            <tr class="heading-value">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="" class="btn btn-primary btn-sm">Approve</a></td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
<br><br>
@endsection