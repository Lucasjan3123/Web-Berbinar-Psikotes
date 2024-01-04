@extends('layouts.main', [
    "page" => "test"
])

@section('content')
<section class="flex flex-col h-full md:h-screen md:justify-center md:items-center w-full gap-6 bg-primary">
    <div class="flex w-full bg-transparent items-center justify-center">
        <div class="flex flex-col gap-10 z-20">
            <div class="flex flex-col w-full">
                <h1 class="text-white font-semibold text-[35px] md:text-[65px] tracking-[-1px]">Psikotes Berbinar</h1>
                <p class="text-white text-[15px] md:text-[19px]">
                    Kerjakan soal dengan cermat dan teliti
                </p>
            </div>
            
            <div class="flex flex-col gap-20">
                <div class="bg-white rounded-3xl shadow-lg p-10 w-[120%]">
                    <p class="text-base text-[#333]">Saya mudah berteman dengan siapapun*</p>
                    <div class="flex flex-col gap-5 border-b pb-6 border-[#F0F0F0]">
                        <div class="flex gap-10 w-full mt-5">
                            <div class="flex items-center justify-center rounded-full bg-[#F0F0F0] text-[#333] w-[20px] h-[20px] p-7 hover:bg-primary hover:text-white cursor-pointer">
                                1
                            </div>
                            <div class="flex items-center justify-center rounded-full bg-[#F0F0F0] text-[#333] w-[20px] h-[20px] p-7 hover:bg-primary hover:text-white cursor-pointer">
                                2
                            </div>
                            <div class="flex items-center justify-center rounded-full bg-[#F0F0F0] text-[#333] w-[20px] h-[20px] p-7 hover:bg-primary hover:text-white cursor-pointer">
                                3
                            </div>
                            <div class="flex items-center justify-center rounded-full bg-[#F0F0F0] text-[#333] w-[20px] h-[20px] p-7 hover:bg-primary hover:text-white cursor-pointer">
                                4
                            </div>
                            <div class="flex items-center justify-center rounded-full bg-[#F0F0F0] text-[#333] w-[20px] h-[20px] p-7 hover:bg-primary hover:text-white cursor-pointer">
                                5
                            </div>
                        </div>
                        <div class="flex w-[85%] items-center justify-between">
                            <p class="text-disabled text-sm">Sangat tidak setuju</p>
                            <p class="text-disabled text-sm">Sangat setuju</p>
                        </div>
                    </div> 
                    <div class="flex flex-row gap-3 mt-10 items-center justify-between">
                        <button class="text-white py-[15px] px-[15px] md:px-[25px] bg-primary rounded-xl md:rounded-3xl text-[13px] md:text-[17px] showModal" href="/introduction">Kembali</button>
                        <a class="text-primary py-[15px] px-[15px] md:px-[25px] bg-transparent rounded-xl md:rounded-3xl text-[13px] md:text-[17px] border border-primary" href="/">Selanjutnya</a>
                    </div>
                </div>
                <p class="text-white text-sm">
                    Copyright © PT Berbinar Insightful Indonesia. 2023
                </p>
            </div>
        </div>

        <img src={{ asset('assets/images/illustrasi-psikotes.png') }} class="w-[741px] h-[740px]" />
    </div>
</section>
@endsection