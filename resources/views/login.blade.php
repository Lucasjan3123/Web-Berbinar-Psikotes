@extends('layouts.main', [
    "page" => "login"
])

@section('content')
<section class="flex h-screen">   
    <div class="w-2/5 mx-auto text-center">
        <a href="/">
            <img src="{{ asset('assets/images/logo.png') }}" class="w-[62px] h-[62px] ml-6 mt-8" alt="Logo-Berbinar">
        </a>
        <h2 class="text-primary text-center mt-24 text-4xl font-semibold">Welcome Back</h2>
        <p class="text-center mt-2">Masuk ke akun berbinar psikotes mu dan lakukan <br>psikotes bersama berbinar</p>
        <div class="mt-10">
            <input type="email" placeholder="Email" class="border-2 h-12 w-[420px] rounded-lg p-4">
            <input type="password" placeholder="Password" class="border-2 h-12 w-[420px] rounded-lg p-4 mt-5">
        </div>
        <div class="mt-4">Belum punya akun?  
            <a href="#" class="text-primary">Daftar Sekarang</a>
        </div>
        <div class="mt-6">
            <a href="/dashboard" class="px-10 py-3 text-white bg-primary rounded-3xl">Login</a>
        </div>
        <p class="mt-40 text-gray-400">Copyright © PT Berbinar Insightful Indonesia 2023</p>
    </div>
    <div class="flex w-3/5 bg-primary">
        <img src="{{ asset('assets/images/ilustrasi_test.png') }}" alt="Ilustrasi-Test" class="m-auto w-[820px]">
    </div>
</section>
@endsection