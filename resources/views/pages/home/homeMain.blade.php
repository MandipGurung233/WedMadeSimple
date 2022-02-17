<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <link rel="stylesheet" href="css/home/home.css">
    </head>
    <body>
        {{ View::make('layout.header') }}
        @yield('home')
        <script>
            $(document).ready(function(){
             $('.owl-carousel').owlCarousel({
             loop:true,
             margin:20,
             autoplay:true,
             autoplayTimeout: 3000,
             autoplayHoverPause:true,
             nav:false,
             responsive:{
                 0:{
                     items:2
                 },
                 600:{
                     items:3
                 },
                 1000:{
                     items:3
                 }
             }
         });
     });
        </script>
        {{ View::make('layout.footer') }}
    </body>
</html>

