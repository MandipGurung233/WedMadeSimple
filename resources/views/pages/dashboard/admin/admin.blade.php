<?php
    use App\Models\clothing;
    use App\Models\makeUp;
    use App\Models\photography;
    use App\Models\venue;
    use App\Models\Approved;
    use Illuminate\Support\Facades\Hash;
    $approve = Approved::all();
    makeUp::truncate();
    photography::truncate();
    venue::truncate();
    clothing::truncate();
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
                    <h4> Pending verification
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
                            @foreach ($value as $item)
                            <tr class="heading-value">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->vendorType }}</td>
                                <td>{{ $item->file }}</td>
                                <td>{{ $item->value }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td><a href="{{ url('approved/'.$item->id) }}" class="btn btn-primary btn-sm">Approve</a></td>
                                <td>
                                    <form action="{{ url('destroy/'.$item->id) }}" method="POST">
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

<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Approved verification
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
                                <td>
                                    <form action="{{ url('destroyApprove/'.$item->id) }}" method="POST">
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

                            @foreach ($approve as $item)
                                <?php     
                                    $purpose=$item->vendorType;
                                    if ($purpose == "Make Up"){
                                        $makeUp = new makeUp;
                                        $makeUp->name=$item->name;
                                        $makeUp->address=$item->address;
                                        $makeUp->email=$item->email;
                                        $makeUp->password=Hash::make($item->password);
                                        $makeUp->vendorType=$purpose;
                                        $makeUp->file=$item->file;
                                        $makeUp->save();
                                     
                                       
                                    } elseif ($purpose == "Venue"){
                            
                                        $venue = new venue;
                                        $venue->name=$item->name;
                                        $venue->address=$item->address;
                                        $venue->email=$item->email;
                                        $venue->password=Hash::make($item->password);
                                        $venue->vendorType=$purpose;
                                        $venue->file=$item->file;
                                        $venue->save();
                            
                            
                                    } elseif ($purpose == "Photography"){
                                       
                                        $photography = new photography;
                                        $photography->name=$item->name;
                                        $photography->address=$item->address;
                                        $photography->email=$item->email;
                                        $photography->password=Hash::make($item->password);
                                        $photography->vendorType=$purpose;
                                        $photography->file=$item->file;
                                        $photography->save();
                            
                                    } else{
                                
                                        $clothing = new clothing;
                                        $clothing->name=$item->name;
                                        $clothing->address=$item->address;
                                        $clothing->email=$item->email;
                                        $clothing->password=Hash::make($item->password);
                                        $clothing->vendorType=$purpose;
                                        $clothing->file=$item->file;
                                        $clothing->save();
                                    }
                                ?>   
                            @endforeach

<?php
    $cloth = clothing::all();
    $venue = venue::all();
    $photo = photography::all();
    $make = makeUp::all();
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Approved Make-up vendors
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
                            @foreach ($make as $item)
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
            <div class="card">
                <div class="card-header">
                    <h4> Approved photography vendors
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
                            @foreach ($photo as $item)
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
<!---->
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Approved venue vendors
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
<!--cloth-->
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Approved clothing vendors
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
                            @foreach ($cloth as $item)
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
@endsection