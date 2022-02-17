@extends('pages.dashboard.customer.customerMain')
@section('home')
<br><br>
<div class="container">    
                <div class="row pt-2 justify-content-center">
                    <div class="col-md-4">
                        <br>
                        <h5>Powered By:</h5>
                        <img src="/image/Book/Khalti logo.png" alt="image" class="img-fluid">
                        <form>
                            <div class="form-group pt-3">
                                <button type="button" class="btn btn-danger mb-5" data-toggle="modal" data-target=".bd-example-modal-lg2" data-dismiss="modal">Advance Payment</button>              
                            </div>
                        </form>
                    </div>  
                    <div class="col-md-7">
                        <form>
                            <div class="form-group pt-3">
                                <h6 style="font-weight:550px;">Total Payment</h6>
                                <input type="text" class="form-control" placeholder="5000">
                                <br>
                                <h6 style="font-weight:550px;">Comment/question *</h6>
                                <textarea type="text" class="form-control" placeholder="Message" rows="8"></textarea>
                                <br>    
                            </div>
                        </form>
                    </div>                
                </div>
</div>
<br><br>
@endsection