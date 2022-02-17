<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <link rel="stylesheet" href="css/about/about.css">
        <script type="text/javascript" src="{{ asset('js/about.js') }}" defer></script>
    </head>
    <body>
        {{ View::make('pages.about.aboutHeader') }}
        @yield('home')
        {{ View::make('layout.footer') }}
    </body>
</html>