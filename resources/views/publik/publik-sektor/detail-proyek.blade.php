<x-guest-layout>
    @include('components.navbar-umum')

<div class="w-full min-h-screen flex flex-col relative">
    <div class="w-full h-auto flex justify-center items-center relative">
        <div class="w-2/5 h-[450px] lg:h-[550px] bg-AccentRed950"></div>
        <div class="w-3/5 h-[450px] lg:h-[550px] bg-white"></div>
        <img src="{{ asset('images/background.png') }}" alt="Image Dashboard"
            class="absolute px-10 w-full h-[350px] lg:h-[450px] object-cover z-10"
            style="transform: translateX(-50%); left: 50%;">
        <div class="absolute w-3/4 mx-auto inset-0 flex flex-col items-start justify-center text-start z-20 p-5 lg:p-0">
            <p class="text-white text-sm md:text-base"><span class="text-OrangeS">Beranda / Program / Sosial</span> / Proyek</p>
            <h1 class="text-white text-3xl md:text-4xl lg:text-5xl xl:text-6xl max-w-screen-lg font-bold mt-3">{{$proyek->nama_proyek}}</h1>
            <div class="flex flex-col lg:flex-row mt-2 lg:mt-0 lg:gap-3">
                <p class="text-gray-300 text-sm md:text-base lg:my-4 mb-2 lg:mb-0">Mulai: {{$proyek->startMonth}} {{$proyek->startDay}} {{$proyek->startYear}}</p>
                <p class="text-gray-300 text-sm md:text-base lg:my-4 lg:block hidden font-bold">·</p>
                <p class="text-gray-300 text-sm md:text-base lg:my-4 mb-3 lg:mb-0">Akhir: {{$proyek->endMonth}} {{$proyek->endDay}} {{$proyek->endYear}}</p>
            </div>
            <p class="text-gray-300 text-sm md:text-base">{{$proyek->deskripsiProgram}}</p>
        </div>
    </div>
    
    <div class="w-full px-7 md:px-0 md:w-3/4 mt-16 mx-auto">
        {{-- Deskripsi Proyek --}}
        <div class="justify-start flex-col text-start">
            <div class="w-[40px] h-[4px] bg-Orange600"></div>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-Ebony900 my-4">Deskripsi proyek</h2>
            <p class="text-Ebony200">{{$proyek->deskripsi}}</p>
        </div>
        {{-- Galeri Section --}}
        <h1 class="text-Ebony900 font-semibold text-xl md:text-2xl mt-12">Galeri</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-5 mb-8">
            <!-- Card 1 -->
            @foreach($imgName as $item)

            <div class="overflow-hidden relative">
                <img class="w-full h-44 object-cover" src="{{ asset('storage/img/proyek/'. $item) }}" alt="Image 1">
            </div>

           @endforeach

        </div>
        {{-- Mitra Yang Berpartisipasi --}}
        <h1 class="text-Ebony900 font-semibold text-2xl md:text-3xl mt-14">Mitra yang berpartisipasi</h1>
        {{-- Table Mitra Yang Berpartisipasi --}}
        <div class="relative overflow-x-auto rounded-lg border border-gray-200 mt-7">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-Ebony900 font-semibold">
                            Nama mitra
                        </th>
                        <th scope="col" class="px-6 py-4 text-Ebony900 font-semibold">
                            Lokasi
                        </th>
                        <th scope="col" class="px-6 py-4 text-Ebony900 font-semibold">
                            No. Telepon
                        </th>
                        <th scope="col" class="px-6 py-4 text-Ebony900 font-semibold">
                            Tgl pengajuan
                        </th>
                        <th scope="col" class="px-6 py-4 text-Ebony900 font-semibold">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($idUser === null)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-normal text-Ebony200 whitespace-nowrap">Belum ada mitra</th>
                        <td class="px-6 py-4 font-normal text-Ebony200">kosong</td>
                        <td class="px-6 py-4 font-normal text-Ebony200">kosong</td>
                        <td class="px-6 py-4 font-normal text-Ebony200">kosong</td>
                        <td class="px-6 py-4 font-normal">
                        </td>
                    </tr>
                    @else
                    @foreach($idUser as $item)'
                    @php

                    $date = $proyek->tanggal_akhir; // Replace with your actual date field name

                     $carbonDate = Carbon\Carbon::parse($date);

                    $item->month = $carbonDate->format('F'); // Full month name
                $item->day = $carbonDate->format('d');   // Day of the month
                $item->year = $carbonDate->format('Y');   // Day of the month
                    @endphp
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-normal text-Ebony200 whitespace-nowrap">{{$item->identity->nama_mitra}}</th>
                        <td class="px-6 py-4 font-normal text-Ebony200">{{$item->email}}</td>
                        <td class="px-6 py-4 font-normal text-Ebony200">{{$item->identity->nomor_hp}}</td>
                        <td class="px-6 py-4 font-normal text-Ebony200">
                            {{$item->day}}
                            {{$item->month}}
                            {{$item->year}}  
                        </td>
                        <td class="px-6 py-4 font-normal">
                            <a href="{{route('identity.mitraDetail', $item->id)}}">
                            <button
                                class="bg-AccentRed900 hover:bg-red-700 text-white py-2 px-4 rounded-lg flex justify-center items-center gap-2 mt-4 md:mt-0 text-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Lihat detail
                            </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>

            </table>
        </div>
        {{-- Contact US Section --}}
        <div class="w-full rounded-lg py-10 mx-auto flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-10 mt-10 md:mt-20">
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
