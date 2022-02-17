<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <link rel="stylesheet" href="css/customer/customer.css">
    </head>
    <body>
        {{ View::make('layout.header') }}
        @yield('home')
        {{ View::make('layout.footer') }}
    </body>
</html>