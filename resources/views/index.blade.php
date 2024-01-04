@extends('layouts.main', [
    "page" => "home"
])

@section('content')
<section class="flex flex-col h-full md:h-[90vh] md:justify-center md:items-center w-full gap-8 mt-3">
    <div class="bg-primary rounded-3xl md:max-w-6xl px-[30px] md:px-[60px] pt-14 pb-12 flex flex-col md:flex-row m-5 md:m-0">
        <div class="flex flex-col gap-6 md:gap-10 w-full md:w-[55%]">
            <h1 class="text-white leading-[116%] font-semibold text-[35px] md:text-[65px] tracking-[-1px]">Tingkatkan potensi dengan psikotes berbinar</h1>
            <p class="text-white leading-[170%] text-[15px] md:text-[19px]">
                Berbinar hadir untuk kamu yang ingin meningkatkan potensi diri melalui layanan tes psikotes individu dan <br> perusahaan.
            </p>
            <div class="flex flex-row gap-3">
                <a class="text-disabled py-[15px] px-[15px] md:px-[25px] bg-white rounded-xl md:rounded-3xl text-[13px] md:text-[17px]" href="/introduction">Coba Free Tes</a>
                <a class="text-white py-[15px] px-[15px] md:px-[25px] bg-transparent rounded-xl md:rounded-3xl text-[13px] md:text-[17px] border border-white" href="">Daftar Psikotes Berbayar</a>
            </div>
        </div>
        <div class="w-fit md:w-[530px]">
            <img src="{{ asset('assets/images/illustrasi-homepage.png') }}" alt="Homepage">
        </div>
    </div>
    <div class="flex flex-wrap gap-8 items-center justify-center">
        <img src="{{ asset('assets/images/companies/com1.png') }}" class="w-[80px] md:w-[111.307px]" alt="Company Logo">
        <img src="{{ asset('assets/images/companies/com2.png') }}" class="w-[80px] md:w-[111.307px]" alt="Company Logo">
        <img src="{{ asset('assets/images/companies/com3.png') }}" class="w-[80px] md:w-[111.307px]" alt="Company Logo">
        <img src="{{ asset('assets/images/companies/com4.png') }}" class="w-[111.307px] hidden md:block" alt="Company Logo">
        <img src="{{ asset('assets/images/companies/com5.png') }}" class="w-[111.307px] hidden md:block" alt="Company Logo">
        <img src="{{ asset('assets/images/companies/com6.png') }}" class="w-[111.307px] hidden md:block" alt="Company Logo">
    </div>
</section>
@endsection