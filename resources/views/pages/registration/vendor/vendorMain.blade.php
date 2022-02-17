<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <link rel="stylesheet" href="css/vendorRegister/vendor.css">
    </head>
    <body>
        {{ View::make('layout.header') }}
        @yield('home')
        {{ View::make('layout.footer') }}
    </body>
</html>