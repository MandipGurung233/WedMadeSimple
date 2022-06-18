@extends('pages.dashboard.admin.adminMain')
@section('home')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Enter the distance
                    </h4>
                </div>
                <br>
                @if (session('status'))
                <h6 class="alert alert-success" style="width:max-content;">{{ session('status') }}</h6>                
                @endif
                <div class="card-body">

                    <form action="{{ url('updateDistance/'.$distance->id) }}" method="POST">
                        @csrf
                    

                        <div class="form-group mb-3">
                            <label for="">Customer Address</label>
                            <input type="text" name=" customer address" value="{{ $distance->custAddress }}" class="form-control" readonly>
                            <span style="color: red; font-size:12px;">@error('customer address'){{ $message }}@enderror</span>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Vendor Address</label>
                            <input type="text" name="vendor address" value="{{ $distance->vendAddress }}" class="form-control" readonly>
                            <span style="color: red; font-size:12px;">@error('vendor address'){{ $message }}@enderror</span>
                            
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Calculated distance (KM)</label>
                            <input type="text" name="calculatedDistance" class="form-control" >
                            <span style="color: red; font-size:12px;">@error('calculatedDistance'){{ $message }}@enderror</span>
                            
                        </div>
                       
                        
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Enter</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection