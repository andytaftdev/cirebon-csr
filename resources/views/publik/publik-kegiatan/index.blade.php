<x-guest-layout>
    @include('components.navbar-umum')

    <div class="w-full min-h-screen flex flex-col relative">
        <div class="w-full h-auto flex justify-center items-center relative">
            <div class="w-2/5 h-[300px] md:h-[400px] bg-AccentRed950"></div>
            <div class="w-3/5 h-[300px] md:h-[400px] bg-white"></div>
            <img src="{{ asset('images/umum-bg.png') }}" alt="Image Dashboard"
                class="absolute px-10 w-full h-[220px] md:h-[300px] object-cover z-10"
                style="transform: translateX(-50%); left: 50%;">
            <div
                class="absolute w-3/4 mx-auto inset-0 flex flex-col items-start justify-center text-start z-20 p-5 md:p-0">
                <p class="text-white text-sm md:text-base"><span class="text-OrangeS">Beranda</span> / Kegiatan</p>
                <h1 class="text-white text-5xl md:text-7xl font-bold mt-3">Kegiatan</h1>
                <p class="text-gray-300 text-sm md:text-base mt-2">Kegiatan terkini dari CSR Kabupaten Cirebon</p>
            </div>
        </div>

        <div class="container mx-auto w-full md:w-3/4 my-4 px-7">
            {{-- Option --}}
            <form class="flex space-x-5 my-10" id="filter"
                action="{{route('kegiatan.publikFilter',['status' => 'semua']) }}" method="GET">
                <select name="sort" id="sort"
                    class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white w-full sm:w-fit md:w-1/3 lg:w-1/4">
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Terbaru</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Terlama</option>
                </select>
                <div class="relative w-9/12">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor"
                        class="absolute left-7 top-1/2 transform -translate-y-1/2 text-Ebony100 w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <input id="searchBar" type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari kegiatan..."
                        class="pl-14 text-base py-2 bg-white border border-Neutral300 rounded-lg w-full">
                </div>
            </form>
            {{-- Card Kegiatan Section --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mt-12">
                <!-- Card 1 -->
                @foreach($kegiatan as $item)
                <a href="{{route('kegiatan.detailKegiatan', $item->id)}}">
                    <div class="flex flex-col h-full">
                        <div class="bg-white border border-Neutral300 overflow-hidden flex flex-col h-full relative">
                            <img class="w-full h-64 object-cover"
                                src="{{ asset('storage/img/kegiatan/'. $item->gambar_kegiatan) }}" alt="Image 2">
                            <!-- Date overlay -->
                            <span
                                class="text-xs text-white bg-AccentRed900 px-4 py-2 rounded absolute top-5 left-5 z-20">{{$item->day}}
                                {{$item->month}} {{$item->year}}</span>
                            <div class="p-6 flex flex-col flex-1">
                                <h2 class="mt-1 text-xl font-bold text-Ebony900">{{$item->judul}}</h2>
                                <p class="mt-2 text-Ebony100">{!! Str::limit($item->deskripsi, 100) !!}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            {{-- Button Muat Lebih Banyak --}}
            <button
                class="bg-white hover:bg-neutral-100 border border-Neutral300 font-semibold rounded-lg text-Ebony200 px-4 py-2 flex justify-center items-center my-10 mx-auto">Muat
                Lebih Banyak
            </button>
            {{-- Contact US Section --}}
            <div
                class="w-full rounded-lg py-10 mx-auto flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-10">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-6 text-AccentRed900">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-5 text-AccentRed900">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-6 text-AccentRed900">
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
    <script>
        document.getElementById('sort').addEventListener('change', function () {
            document.getElementById('filter').submit();
        });
        document.getElementById('searchBar').addEventListener('change', function () {
            document.getElementById('filter').submit();
        });

    </script>

</x-guest-layout>
