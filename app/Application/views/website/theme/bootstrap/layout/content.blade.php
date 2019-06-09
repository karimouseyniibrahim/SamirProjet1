<div class="container">
    <!--Site: Content-->
    <section class="mt-4">
        <!--Grid row-->
        <div class="row py-3">
            <!--@include(layoutSideBar('website'))-->
            <!--Grid column-->
            <div class="col-md-9 mb-4">
               <div data-spy="scroll" data-target="#navbar-example3"
      data-offset="0"> 
                @yield('content')
                </div>
            </div>
        </div>
        <!--Grid row-->
    </section>
    <!--Site: Content-->
</div>