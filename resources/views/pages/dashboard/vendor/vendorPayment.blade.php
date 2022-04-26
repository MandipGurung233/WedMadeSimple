@extends('pages.dashboard.vendor.vendorMain')
@section('home')
<?php
        use App\Models\Approved;
        $ids = $id;
        $views = Approved::where(['id'=>$ids])->first();
        $amount =  $views->value;
        $amount1 = $amount / 2;    
?>
<br><br>
<div class="container">    
                <div class="row pt-2 justify-content-center">
                    <div class="col-md-4">
                        @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <br>
                        <h5>Powered By:</h5>
                        <img src="/image/Book/Khalti logo.png" alt="image" class="img-fluid">
                       
                            <div class="form-group pt-3">
                                <button  id="payment-button" class="btn btn-danger mb-5">Advance Payment</button>              
                            </div>                                         
                    </div>  
                    <div class="col-md-7">
                        <form>
                            <div class="form-group pt-3">
                                <h6 style="font-weight:550px;">Total Payment</h6>
                                <input type="text" class="form-control" placeholder= ' Nrs {{$amount}}'>
                                <br>
                                <h6 style="font-weight:550px;">Advance Payment (50 %)</h6> 
                                <input type="text" class="form-control" placeholder= ' Nrs {{$amount1}}'>
                                <br>
                                 
                            </div>
                        </form>
                    </div>                
                </div>
</div>
   <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_7d1e222d9bec48cf92d19e0e744ca8e2",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    $.ajax({
                            type : 'POST',
                            url : "{{ route('khalti.verifyPayment') }}",
                            data: {
                                token : payload.token,            
                                amount : payload.amount,
                                "_token" : "{{ csrf_token() }}"
                            },
                            success : function(res){
                                $.ajax({
                                    type : "POST",
                                    url : "{{ route('khalti.storePayments') }}",
                                    data : {
                                        response : res,
                                        paid : {{$ids}},
                                        "_token" : "{{ csrf_token() }}"
                                    },
                                    success: function(res){
                                        
                                        console.log('transaction successfull');
                                    }
                                });
                                console.log(res);
                            }
                        });
                        
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000 });
        }
    </script>
@endsection