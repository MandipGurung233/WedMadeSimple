<!DOCTYPE html>
<html lang="en">
    <head>
        {{ View::make('layout.main') }}
        <link rel="stylesheet" href="css/blog/blog.css">
    </head>
    <body>
        {{ View::make('pages.blog.blogHeader') }}
        @yield('home')
        {{ View::make('layout.footer') }}
    </body>
</html>