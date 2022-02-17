<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        
        <link rel="stylesheet" href="css/vendorPage/makeUp/makeUp.css">
        <link rel="stylesheet" href="css/customer/customer.css">
        <script type="text/javascript" src="{{ asset('js/vendor/makeUp/makeUp.js') }}" defer></script>
    </head>
    <body>
        {{ View::make('pages.vendorPage.makeUp.header') }}
        @yield('home')
        <script type="text/javascript">
            $(function() {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
        <script>
            $(document).ready(function(){
             $('.owl-carousel').owlCarousel({
             loop:true,
             margin:20,
             autoplay:true,
             autoplayTimeout: 2000,
             autoplayHoverPause:true,
             nav:false,
             responsive:{
                 0:{
                     items:2
                 },
                 700:{
                     items:4
                 },
                 1000:{
                     items:4
                 }
             }
         });
     });
        </script>

        
        {{ View::make('layout.footer') }}
    </body>
</html>