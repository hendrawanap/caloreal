<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>

<body class="flex flex-col min-h-screen">
    <nav class="fixed top-0 left-0 right-0 py-4 z-50 transition duration-300" id="nav-bar">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}">Logo</a>
            <ul class="flex">
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}">
                                <div class="border rounded-2xl border-primary mr-2 px-9 py-2 text-sm">
                                    Log In
                                </div>
                            </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="hidden sm:inline">
                            <a href="{{ route('register') }}">
                                <div class="border rounded-2xl border-primary bg-primary px-9 py-2 text-white text-sm">
                                    Sign Up
                                </div>
                            </a>
                        </li>
                    @endif
                @else
                    <li>
                        <div class="flex items-center">
                            <a href="#" class="mr-2">
                                {{ Auth::user()->name }}
                            </a>

                            <form action="{{ route('logout') }}" method="POST" class="ml-2">
                                @csrf
                                <button href="{{ route('logout') }}"
                                    class="border-2 rounded-2xl border-primary bg-primary px-9 py-2 text-white text-sm" type="submit">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    
    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="static bottom-0 bg-primary py-6">
        <div class="container mx-auto text-white text-center text-sm font-normal">
            2021 Made by Daking 🦆
        </div>
    </footer>
    <script>
      window.onscroll = function() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("nav-bar").style.backgroundColor = "#E9FCFD";
        } else {
          document.getElementById("nav-bar").style.backgroundColor = "transparent";
        }
      }
    </script>
</body>

</html>
