@extends('pages.dashboard.vendor.vendorMain')
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

                    <form action="{{ url('updateApprove/'.$approved->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label for="">Password</label>
                            <input type="text" name="password" value="{{ $approved->password }}" class="form-control">
                            <span style="color: red; font-size:12px;">@error('password'){{ $message }}@enderror</span>
                            
                        </div>
                        <div class="form-group mb-3">
                                <label for="">Description</label>
                                <textarea class="form-control" style="height:150px" name="description" placeholder="detail">{{ $approved->description }}</textarea> 
                                <span style="color: red; font-size:12px;">@error('description'){{ $message }}@enderror</span>
                                
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="img" class="form-control"><br>
                            <img src ="{{ asset('uploads/vendor/'.$approved->img) }}" width="70px" height="70px" alt="image">
                            
                        </div>
                        <span style="color: red; font-size:12px;">@error('img'){{ $message }}@enderror</span>
                            
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