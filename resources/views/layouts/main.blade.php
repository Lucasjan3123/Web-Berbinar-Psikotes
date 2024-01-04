<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">

    <title>Berbinar Psikotes</title>

    @vite('resources/css/app.css')
</head>
<body class="@if($page == 'home') h-screen @endif scrollbar-hide font-poppins">
    @if($page == 'home')
    <header class="w-full fixed py-4 bg-white">
        <nav class="flex w-full items-center mx-auto justify-between max-w-6xl">
            <img src="{{ asset('assets/images/logo.png') }}" class="w-14 h-14" />
            <div class="flex gap-10 items-center justify-around">
                <a class="text-disabled text-base" href="">About</a>
                <a class="text-disabled text-base" href="">Psikotes Individu</a>
                <a class="text-disabled text-base" href="">Psikotes Perusahaan</a>
                <a class="text-white py-[13px] px-[15px] md:px-[35px] bg-primary rounded-xl md:rounded-3xl text-[13px] md:text-[17px] showModal" href="/login">Login</a>
            </div>
        </nav>
    </header>
    @endif

    <main class="w-full h-screen @if($page == 'home') pt-14 @endif">
        @yield('content')
    </main>
</body>
</html>