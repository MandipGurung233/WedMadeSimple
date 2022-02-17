<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <link rel="stylesheet" href="css/makeUp/makeUp.css">
    </head>
    <body>
        {{ View::make('pages.makeUp.header') }}
        @yield('home')
        {{ View::make('layout.footer') }}
    </body>
</html>