<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> --}}
    {{-- <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
      body {
        font-family: 'Poppins', sans-serif; 
      }
    </style> --}}
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
        2021 Made by Daking
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  </body>
</html>
