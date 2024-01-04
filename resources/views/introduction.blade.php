@extends('layouts.main', [
    "page" => "introduction",
])

@section('content')
<section class="flex flex-col h-full md:h-screen md:justify-center md:items-center w-full gap-8">
    <section class="bg-primary rounded-3xl md:max-w-6xl px-[30px] md:px-[60px] pt-14 pb-16 flex flex-col md:flex-row m-5 md:m-0">
        <div class="flex flex-col items-center text-white">
            <h2 class="intro_title md:w-full w-[90%] text-center font-semibold text-6xl mb-8 leading-tight ">Free Tes <br> Psikotes Berbinar</h2>
            <p class="intro_description md:w-[70%] w-[85%] text-justify">Tes ini merupakan model dari tes lima dimensi kepribadian yang dapat mengungkapkan potensi karir yang sesuai dengan kepribadian Anda. Tes Lima Dimensi Kepribadian secara luas dianggap sebagai cara paling kuat untuk menggambarkan perbedaan kepribadian yang Anda miliki. Ini adalah dasar penelitian kepribadian paling modern. <br><br> Tes Lima Dimensi Kepribadian adalah salah satu alat tes untuk mengungkap kepribadian berdasarkan teori Big Five Personality yang dikemukakan oleh seorang psikolog terkenal, yaitu Lewis Goldberg. Dalam teori sifat kepribadian "The Big Five Personality Traits Model" tersebut terdiri dari lima dimensi kunci diantaranya seperti, Openness (O), Conscientiousness (C), Extraversion (E), Agreeableness (A) dan Neuroticism (N).</p>    

            <div class="flex flex-row gap-3 mt-10">
                <button class="text-disabled py-[15px] px-[15px] md:px-[25px] bg-white rounded-xl md:rounded-3xl text-[13px] md:text-[17px] showModal">Mulai Tes</button>
                <a class="text-white py-[15px] px-[15px] md:px-[25px] bg-transparent rounded-xl md:rounded-3xl text-[13px] md:text-[17px] border border-white" href="/">Kembali ke Beranda</a>
            </div>
        </div>
    </section>

    <section>
        <div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-3xl shadow-lg w-2/5">
                <div class="border-b px-6 py-6">
                    <h1 class="text-primary text-4xl font-semibold mb-2  text-center">Instruksi Pengisian</h1>
                    <p class="text-center">Perhatikan dengan seksama instruksi pengisian berikut untuk mengisi free tes psikotes berbinar</p>
                </div>
                <div class="p-6">
                    <p class="text-justify">Pada tes ini, setiap nomor berisikan satu pernyataan beserta lima pilihan skor jawaban. Tugas Anda adalah menentukan skor kesesuaian setiap pernyataan dengan keadaan diri Kamu yang sebenarnya. Tiap pilihan skor kesesuaian yang Anda pilih memiliki kriterianya masing-masing.</p>
                    <p><br>Keterangan Skor:
                        <br>1: Sangat tidak sesuai
                        <br>2: Tidak sesuai
                        <br>3: Ragu-ragu
                        <br>4: Sesuai
                        <br>5: Sangat sesuai</p>
                </div>
                <div class="flex gap-4 justify-center items-center w-100 border-t p-3">
                        <a class="text-white py-[15px] px-[15px] md:px-[25px] bg-primary rounded-xl md:rounded-3xl text-[13px] md:text-[17px] showModal" href="/test">Mulai</a>
                        <button class="text-white py-[15px] px-[25px] md:px-[45px] bg-disabled rounded-xl md:rounded-3xl text-[13px] md:text-[17px] border border-white closeModal">Kembali</button>
                </div>
            </div>
        </div>
    </section>

    <script>
        const modal = document.querySelector('.modal');

        const showModal = document.querySelector('.showModal');
        const closeModal = document.querySelector('.closeModal');

        showModal.addEventListener('click', function(){
            modal.classList.remove('hidden')
        });

        closeModal.addEventListener('click', function(){
            modal.classList.add('hidden')
        });
    </script>
</section>
@endsection