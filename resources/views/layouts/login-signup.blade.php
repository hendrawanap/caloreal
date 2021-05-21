<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>

<body class="flex flex-col min-h-screen">
    <nav class="sticky top-0 py-6">
      <div class="container mx-auto flex items-center">
        <a href="{{ url()->previous() }}" class="material-icons mr-4 text-4xl text-gray-400">arrow_left</a>
        <a href="{{route('home')}}"><img class="w-32" src="{{ asset('img/caloreal.png') }}" alt=""></a>
      </div>
    </nav>
    
    <main class="flex-grow">
        @yield('content')
    </main>
</body>

</html>
