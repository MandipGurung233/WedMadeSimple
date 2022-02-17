<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <link rel="stylesheet" href="css/contact/contact.css">
    </head>
    <body>
        {{ View::make('pages.contact.contactHeader') }}
        @yield('home')
        {{ View::make('layout.footer') }}
    </body>
</html>