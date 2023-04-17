<?php
    use App\Models\Approved;
    $approve = Approved::all();
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
                        
                                <th>name</th>
                                <th>address</th>
                                <th>email</th>
                                <th>vendorType</th>
                        
                              
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approve as $item)
                                @if ( $item->approves != 1)
                                    <tr class="heading-value">
                                   
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->vendorType }}</td>
                                    
                                        <td>{{ $item->created_at }}</td>
                                       
                                        <td><a href="{{ url('approved/'.$item->id) }}" class="btn btn-primary btn-sm">Approve</a></td>
                                        <td>
                                            <form action="{{ url('destroy/'.$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                        <td><a href="{{  url('/view',$item->id) }}" class="btn btn-primary btn-sm" target="_blank">View</a></td>
                                  
                                        <td><a href="{{ url('/download',$item->file) }}" class="btn btn-primary btn-sm">Download</a></td>
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
                       
                                <th>name</th>
                                <th>address</th>
                                <th>email</th>
                                <th>vendorType</th>
                         
                                <th>value</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approve as $item)
                                @if ( $item->approves == 1 )
                                    <tr class="heading-value">
                                        
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->vendorType }}</td>
                                    
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <form action="{{ url('destroy/'.$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                        <td><a href="{{  url('/view',$item->id) }}" class="btn btn-primary btn-sm" target="_blank">View</a></td>
                                  
                                  <td><a href="{{ url('/download',$item->file) }}" class="btn btn-primary btn-sm">Download</a></td>
                           
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
                            <?php
                                $name = "Make Up";
                            ?>
                            @foreach ($approve as $item)
                                @if ( $item->vendorType == $name && $item->approves == 1 )
                                    <tr class="heading-value">
                                   
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->vendorType }}</td>
                                        <td>{{ $item->file }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $item->created_at }}</td>
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
                            <?php
                                $name = "Photography";
                            ?>
                            @foreach ($approve as $item)
                                @if ( $item->vendorType == $name && $item->approves == 1 )
                                    <tr class="heading-value">
                                    
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->vendorType }}</td>
                                        <td>{{ $item->file }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $item->created_at }}</td>
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
                            <?php
                                $name = "Venue";
                            ?>
                       
                            @foreach ($approve as $item)
                                @if ( $item->vendorType == $name && $item->approves == 1 )
                                    <tr class="heading-value">
                                    
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->vendorType }}</td>
                                        <td>{{ $item->file }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $item->created_at }}</td>
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
                            <?php
                                $name = "Clothing";
                            ?>

                            @foreach ($approve as $item)
                                @if ( $item->vendorType == $name && $item->approves == 1 )
                                    <tr class="heading-value">
                                     
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->vendorType }}</td>
                                        <td>{{ $item->file }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $item->created_at }}</td>
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