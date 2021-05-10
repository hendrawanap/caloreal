<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="sticky top-0 py-4 bg-ternary">
      <div class="container mx-auto flex justify-between items-center">
        <a>Logo</a>
        <div class="flex">
          <div class="border-2 rounded-2xl border-black mr-2 px-9 py-2 text-sm">Log In</div>
          <div class="border-2 rounded-2xl border-black bg-primary px-9 py-2 text-white text-sm">Sign Up</div>
        </div>
      </div>
    </nav>
    @yield('container')
    <footer class="bg-primary py-6">
      <div class="container mx-auto text-white text-center text-sm">
        2021 Made by Daking🦆
      </div>
    </footer>
  </body>
</html>
