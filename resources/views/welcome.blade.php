<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="antialiased">
    <!--welcome-->

<nav class="flex justify-between bg-black h-[80px] text-white w-[96.55rem]">

<div class="px-5 xl:px-12 py-6 flex w-full items-center ">
    <a class="text-3xl font- flex items-center font-heading h-[60px] w-[170px]" href="#">
        <img src="images/logo.png" alt="logo">

    </a>
    <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
        <li><a class="text-black" href="#">Home</a></li>
        <li><a class="text-black" href="#">Products</a></li>
        <li><a class="text-black" href="#">Collections</a></li>
        <li><a class="text-black" href="#">Contact Us</a></li>
    </ul>

    <a href="{{route("login")}}"class="p-2 mr-4 px-10 bg-yellow-400 hover:bg-black hover:text-white rounded-lg">login</button>
    <a href="{{ route("register") }}" class="p-2 px-10 bg-yellow-400 hover:bg-black hover:text-white rounded-lg">register</a>
</div>
<!-- Responsive navbar -->

<a class="navbar-burger self-center mr-12 xl:hidden" href="#">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</a>

</nav>



        <div class="banner fixed inset-0 z-[-40]"> <video autoplay muted loop> <source src="images/TAXI.mp4" type="video/mp4"> </video> </div>

        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-l mt-52">
                <h1 class="mb-5 text-5xl font-bold">Welcome to Grand-<span  class="text-yellow-400">Th</span>-Taxi</h1>
                <p class="mb-5 font-bold">Don’t wait, grab our premium Services now up to <span  class="text-yellow-400">500</span> Verified Drivers and <span class="text-yellow-400">50.000</span> Passengers</p>
                <a href="{{route("driver-register")}}" class=" rounded-md p-2 bg-yellow-400 hover:bg-black text-lg hover:text-white ">Get Started as a driver</a>
            </div>
        </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
    </body>
</html>
