<div class="container">

    <div class="card card-cascade wider reverse ">

 
        <!--Card image-->
        @if(isset($imag['imag']))
        <div class="view view-cascade overlay wow fadeIn" >
            <img style=" height: 300px;  " src="{{ $imag['imag']}}" class="card-img-top mx-auto d-block">
            <a href="#!">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>
        
          <!-- Card image -->
        <!--/Card image-->

        <!--Card content-->
        <div class="card-body card-body-cascade text-center wow fadeIn" data-wow-delay="0.2s">
            <!--Title-->
               {{-- <a class="btn btn-primary btn-lg">Primary button</a>
                <a class="btn btn-primary btn-lg">Primary button</a> --}}
            <a class="btn btn-primary btn-lg">{{trans("artisan.inscription")}}</a>

        </div>
        @endif 
        <!--/.Card content-->


    </div> 
    
</div>