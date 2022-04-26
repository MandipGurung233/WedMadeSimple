@extends('pages.home.homeMain')
@section('home')
<div class="header">   
    <div class="overlay"></div>  
    <div class="container">
      <!--banner-->
        <div class="row justify-content-center slider-text align-items-center mt-6">
            <div class="col-md-6 col-lg-8 mt-10">
            <div class="text text-center">
                <h1 class="mb-4" id="bann">And So<br>The adventure Begins</h1>
                
                <form action="/search" class="search-location mt-md-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 align-items-end">
                        <div class="form-group">
                            <div class="form-field">
                            
                            <input type="text" name="search" class="form-control" placeholder="@if (session('status')) {{ session ('status') }} @else Search location @endif">
                            <button>
                                    <i class="bi bi-search" id="nn"></i>
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            
            </div>
            </div>
        </div>

        <div class=" animate">
            
            <div class="animate-txt">Find the best Vendor with ratings</div>
                <ul class="animate-txts">
                    <li><span>Venue</span></li>
                    <li><span>Make-up</span></li>
                    <li><span>Clothing</span></li>
                    <li><span>Photographer</span></li>
                </ul>
            
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center" style="padding-top: 80px;">
        <div class="col-md-12 heading-section text-center mt-0">
            <span class="subheading mb-2">Searched Result</span>
        </div>
    </div>
    <div class="row justify-content-center" id="feature">   
<br>
    <?php
        $approve = count($id);
        use App\Models\Approved;
        $approvedOne = Approved::all();
    ?>
    @for($i=0;$i<$approve;$i++)
                <?php
                $value = $id[$i];
                $data = Approved::where(['id'=>$value])->first();

                ?>       
            
                   
                        <a href="{{ url('customizeFeature/'.$data->id) }}">
                            <div class="col-md-3 text-center" id="featuretxt">
                                <div class="container" id="feature-img1">                                                              
                                                                        
                                </div>
                                <h5>{{$data->name}} | <i class="bi bi-file-earmark-check-fill" style="color: green"></i></h5>
                                <p><span style="font-weight:bold;">Location: {{ $data->address}}</span></p>                                    
                            </div>
                        </a>      
    @endfor
    </div>
<br>
@endsection