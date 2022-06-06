@extends('pages.dashboard.customer.customerMain')
@section('home')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Update your Information
                    </h4>
                </div>
                <br>
                @if (session('status'))
                <h6 class="alert alert-success" style="width:max-content;">{{ session('status') }}</h6>                
                @endif
                <div class="card-body">

                    <form action="{{ url('updateApproved/'.$approved->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $approved->name }}" class="form-control">
                            <span style="color: red; font-size:12px;">@error('name'){{ $message }}@enderror</span>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{ $approved->address }}" class="form-control">
                            <span style="color: red; font-size:12px;">@error('address'){{ $message }}@enderror</span>
                            
                        </div>
                       
                        
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection