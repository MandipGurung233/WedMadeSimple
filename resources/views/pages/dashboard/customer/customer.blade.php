@extends('pages.dashboard.customer.customerMain')
@section('home')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5> Your booking information
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