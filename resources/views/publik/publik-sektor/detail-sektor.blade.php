<x-guest-layout>
    @include('components.navbar-umum')

<div class="w-full min-h-screen flex flex-col relative">
    <div class="w-full h-auto flex justify-center items-center relative">
        <div class="w-2/5 h-[300px] md:h-[400px] bg-AccentRed950"></div>
        <div class="w-3/5 h-[300px] md:h-[400px] bg-white"></div>
        <img src="{{ asset('images/background.png') }}" alt="Image Dashboard"
            class="absolute px-10 w-full h-[220px] md:h-[300px] object-cover z-10"
            style="transform: translateX(-50%); left: 50%;">
        <div class="absolute w-3/4 mx-auto inset-0 flex flex-col items-start justify-center text-start z-20 p-5 md:p-0">
            <p class="text-white text-sm md:text-base"><span class="text-OrangeS">Beranda / Sektor</span> / Sosial</p>
            <h1 class="text-white text-5xl md:text-7xl font-bold mt-3">{{$sektor->nama_sektor}}</h1>
            <p class="text-gray-300 text-sm md:text-base mt-2">Program CSR yang sudah berjalan di kabupaten cirebon</p>
        </div>
    </div>

    <div class="container mx-auto w-full md:w-3/4 px-7">
        <div class="my-12 md:my-20">
            <div class="flex justify-start items-start">
                <div class="justify-start flex-col text-start">
                    <div class="w-[40px] h-[4px] bg-Orange600"></div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-center items-start mt-5 gap-10">
                <div class="md:w-1/2 flex justify-start content-start self-start">
                    <p>{{$sektor->deskripsi1}}</p>
                </div>
                <div class="md:w-1/2 self-start">
                    <p>{{$sektor->deskripsi2}}</p>
                </div>
            </div>
            {{-- Program CSR Section --}}
            <div class="flex justify-start items-start mt-28">
                <div class="justify-start flex-col text-start">
                    <div class="w-[40px] h-[4px] bg-Orange600"></div>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-Ebony900 my-4">Program CSR</h2>
                    <p class="text-Ebony200">Bidang program CSR Kabupaten Cirebon yang tersedia</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row mt-10">
                <!-- Sidebar -->
                <div class="w-full md:w-1/4 mb-4 md:mb-0">
                    <ul>
                    <!-- @foreach($programs as $program)
    <h3>{{ $program->nama_program }} ({{ $program->proyek_count }} Proyek)</h3>

    <ul>
        @foreach($program->proyek as $proyek)
            <li>{{ $proyek->name }}</li>
        @endforeach
    </ul>
@endforeach -->
                        <li class="border-l-4 border-red-500 bg-AccentRed100 p-4 flex items-center justify-between">
                            <div>
                                <a href="#" class="text-Ebony900 md:text-lg font-bold">Rehabilitasi sosial</a>
                                <p class="text-gray-500 text-base">9 proyek</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </li>
                        <li class="border-l-4 border-gray-200 hover:bg-gray-100 p-4 flex items-center justify-between">
                            <div>
                                <a href="#" class="text-Ebony900 md:text-lg font-bold">Jaminan sosial</a>
                                <p class="text-gray-500 text-base">13 proyek</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </li>
                        <li class="border-l-4 border-gray-200 hover:bg-gray-100 p-4 flex items-center justify-between">
                            <div>
                                <a href="#" class="text-Ebony900 md:text-lg font-bold">Pemberdayaan sosial</a>
                                <p class="text-gray-500 text-base">1 proyek</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </li>
                        <li class="border-l-4 border-gray-200 hover:bg-gray-100 p-4 flex items-center justify-between">
                            <div>
                                <a href="#" class="text-Ebony900 md:text-lg font-bold">Perlindungan sosial terhadap
                                    PMKS</a>
                                <p class="text-gray-500 text-base">8 proyek</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </li>
                        <li class="border-l-4 border-gray-200 hover:bg-gray-100 p-4 flex items-center justify-between">
                            <div>
                                <a href="#" class="text-Ebony900 md:text-lg font-bold">Lainnya</a>
                                <p class="text-gray-500 text-base">23 proyek</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="w-full md:w-3/4 px-4 md:px-10">
                    <div class="grid grid-cols-1 gap-4">
                        <!-- Content 1 -->
                        <div
                            class="flex flex-col md:flex-row items-start md:items-center justify-between bg-white py-3.5 md:px-0 md:p-3 border-b border-Neutral300">
                            <div class="flex-1">
                                <p class="text-gray-500 max-w-80">Pengadaan sarana keterampilan <br> Olahan Pangan</p>
                            </div>
                            <div class="flex-1 mt-2 md:mt-0">
                                <p class="text-gray-500 max-w-80">UPTD Pusat Pelayanan Sosial Griya Wanita Mandiri, Kab
                                    Cirebon</p>
                            </div>
                            <button
                                class="bg-AccentRed900 hover:bg-red-700 text-white text-nowrap py-2 px-4 rounded-lg flex justify-center items-center gap-2 mt-4 md:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Lihat detail
                            </button>
                        </div>
                        {{-- Content 2 --}}
                        <div
                            class="flex flex-col md:flex-row items-start md:items-center justify-between bg-white py-3.5 md:px-0 md:p-3 border-b border-Neutral300">
                            <div class="flex-1">
                                <p class="text-gray-500 max-w-80">Pengadaan sarana keterampilan <br> Olahan Pangan</p>
                            </div>
                            <div class="flex-1 mt-2 md:mt-0">
                                <p class="text-gray-500 max-w-80">UPTD Pusat Pelayanan Sosial Griya Wanita Mandiri, Kab
                                    Cirebon</p>
                            </div>
                            <button
                                class="bg-AccentRed900 hover:bg-red-700 text-white text-nowrap py-2 px-4 rounded-lg flex justify-center items-center gap-2 mt-4 md:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Lihat detail
                            </button>
                        </div>
                        {{-- Content 3 --}}
                        <div
                            class="flex flex-col md:flex-row items-start md:items-center justify-between bg-white py-3.5 md:px-0 md:p-3 border-b border-Neutral300">
                            <div class="flex-1">
                                <p class="text-gray-500 max-w-80">Pengadaan sarana keterampilan <br> Olahan Pangan</p>
                            </div>
                            <div class="flex-1 mt-2 md:mt-0">
                                <p class="text-gray-500 max-w-80">UPTD Pusat Pelayanan Sosial Griya Wanita Mandiri, Kab
                                    Cirebon</p>
                            </div>
                            <button
                                class="bg-AccentRed900 hover:bg-red-700 text-white text-nowrap py-2 px-4 rounded-lg flex justify-center items-center gap-2 mt-4 md:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Lihat detail
                            </button>
                        </div>
                        {{-- Content 4 --}}
                        <div
                            class="flex flex-col md:flex-row items-start md:items-center justify-between bg-white py-3.5 md:px-0 md:p-3 border-b border-Neutral300">
                            <div class="flex-1">
                                <p class="text-gray-500 max-w-80">Pengadaan sarana keterampilan <br> Olahan Pangan</p>
                            </div>
                            <div class="flex-1 mt-2 md:mt-0">
                                <p class="text-gray-500 max-w-80">UPTD Pusat Pelayanan Sosial Griya Wanita Mandiri, Kab
                                    Cirebon</p>
                            </div>
                            <button
                                class="bg-AccentRed900 hover:bg-red-700 text-white text-nowrap py-2 px-4 rounded-lg flex justify-center items-center gap-2 mt-4 md:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Lihat detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Contact US Section --}}
        <div class="w-full rounded-lg py-10 mx-auto flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-10">
            <div class="flex flex-col w-full md:w-1/2">
                <div class="w-[40px] h-[4px] bg-Orange600"></div>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-Ebony900 mt-5">Hubungi Kami</h2>
                <p class="text-Ebony100 text-lg mt-2 mb-10 max-w-[80%]">
                    Hubungi kami melalui formulir di samping, atau melalui kontak di bawah.
                </p>
                <div class="space-y-6">
                    {{-- Alamat --}}
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-AccentRed100 rounded-full flex items-center justify-center mr-4">
                            <div class="bg-Red100 w-10 h-10 rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-6 text-AccentRed900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="font-semibold text-Ebony900 text-lg">Alamat</p>
                            <p class="font-semibold text-AccentRed900 max-w-80">
                                Jl. Sunan Kalijaga No.7, Sumber, Kec. Sumber, Kabupaten Cirebon, Jawa Barat 45611
                            </p>
                        </div>
                    </div>
                    {{-- Phone --}}
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-AccentRed100 rounded-full flex items-center justify-center mr-4">
                            <div class="bg-Red100 w-10 h-10 rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-5 text-AccentRed900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="font-semibold text-Ebony900 text-lg">Phone</p>
                            <p class="font-semibold text-AccentRed900 max-w-80">
                                (0231) 321197 <span class="font-normal text-Ebony100">atau</span> (0231) 3211792
                            </p>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-AccentRed100 rounded-full flex items-center justify-center mr-4">
                            <div class="bg-Red100 w-10 h-10 rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-6 text-AccentRed900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="font-semibold text-Ebony900 text-lg">Email</p>
                            <p class="font-semibold text-AccentRed900 max-w-80">
                                pemkab@cirebonkab.go.id
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Maps (iframe) --}}
            <div class="w-full flex justify-end items-center md:w-1/2 overflow-hidden">
                <iframe class="rounded-xl"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126727.45521340737!2d108.53109120810333!3d-6.741796154826186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1edbeac82d55%3A0x3039d80b2201da0!2sKabupaten%20Cirebon%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1629440009474!5m2!1sid!2sid"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    <x-footer-umum></x-footer-umum>
</div>


</x-guest-layout>
