<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <link rel="stylesheet" href="css/service/service.css">
    </head>
    <body>
        {{ View::make('pages.service.serviceHeader') }}
        @yield('home')
        {{ View::make('layout.footer') }}
    </body>
</html>