<x-app-layout>
<main class="flex-grow"> 
    

    @if (Auth::user()->level === 'mitra')

    @include('components.navbar-mitra')



    <div class="container w-full md:w-3/4 mx-auto py-5 px-6 md:px-0 flex items-center space-x-2">
        <a href="/dashboard" class="flex items-center text-Ebony100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-Ebony100">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Laporan</span>
    </div>

    <div class="container md:w-3/4 mx-auto py-8 px-6 md:px-0">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl md:text-3xl font-semibold text-Ebony900">Laporan Mitra</h1>
            <a href="{{route('laporan.create')}}"><button class="bg-AccentRed900 hover:bg-red-700 text-white text-sm md:text-base px-4 py-2 rounded-lg">
                    + Buat Laporan Baru
                </button>
            </a>
        </div>

        <div class="mt-6">
            <div class="relative">
                <input type="text" class="w-full pl-6 pr-4 py-2 border rounded-lg shadow-sm border-gray-300"
                    placeholder="Cari">
            </div>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg mt-6 border border-Neutal200">
            <table class="w-full text-left rtl:text-right">
                <thead class="text-sm uppercase border-b border-Neutal200 bg-white text-Gray900">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Judul
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Lokasi
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Realisasi
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Tgl Realisasi
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Laporan Dikirim
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Status
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <button class="text-Neutral700 hover:text-gray-900">
                                AKSI
                            </button>
                        </th>
                    </tr>
                </thead>

                <tbody class="text-Neutral700 text-sm whitespace-nowrap">
                    @foreach($laporan as $item)
                    <tr class="bg-white border-b border-Neutal200">
                        <th scope="row" class="px-6 py-4 font-normal">{{$item->judul}}</th>
                        <td class="px-6 py-4">{{$item->proyek->kecamatan}}</td>
                        <td class="px-6 py-4">Rp.{{number_format($item->realisasi, 0, ',', ',')}}</td>
                        <td class="px-6 py-4">{{$item->tanggal}} {{$item->bulan}} {{$item->tahun}}</td>
                        <td class="px-6 py-4">{{$item->releaseDay}} {{$item->releaseMonth}} {{$item->releaseYear}}</td>
                        <td class="px-6 py-4">
                            @if($item->status === 'terima')
                            <span class="bg-Success50 text-Success700 py-1 px-3 rounded-full text-xs">Diterima</span>
                            @elseif($item->status === 'draf')
                            <span class="bg-Gray100 text-Gray700 py-1 px-3 rounded-full text-xs">Draf</span>
                            @elseif($item->status === 'revisi')
                            <span class="bg-Warning50 text-Warning700 py-1 px-3 rounded-full text-xs">Revisi</span>
                            @elseif($item->status === 'pengajuan')
                            <span class="bg-Blue50 text-Blue500 py-1 px-3 rounded-full text-xs">Pengajuan</span>
                            @elseif($item->status === 'tolak')
                            <span
                                class="bg-AccentRed100 text-AccentRed300 text- py-1 px-3 rounded-full text-xs">tolak</span>
                            @endif

                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('laporan.show', $item->id)}}" class="text-Ebony300 hover:text-Ebony900">
                                <!-- Eye Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div
                 class="flex items-center justify-between bg-white px-6 py-3  rounded-b-lg border-b border-l border-r border-Neutral300">
                @if ($laporan->hasPages())
                <div class="flex items-center justify-between w-full">
                    {{-- Pagination Links --}}
                    <div class="w-full">
                        {{ $laporan->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="w-full bg-white mx-auto py-12 mt-44 px-6 md:px-0">
        {{-- Contact US Section --}}
        <div
            class="w-full md:w-3/4 mx-auto rounded-lg flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-10">
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

    @else

    @include('components.navbar-admin')

    <!-- Bagian Header dengan Icon Home -->
    <div class="container w-full px-6 md:px-0 md:w-3/4 my-4 mx-auto py-5 flex items-center space-x-2">
        <div class="flex items-center space-x-2 mb-4">
            <a href="/dashboard" class="flex items-center text-Ebony100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </a>
            <a class="flex items-center text-Ebony100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
            <span class="text-sm font-medium text-AccentRed900 bg-red-100 px-2 py-1 rounded-md">Mitra</span>
        </div>
    </div>

    <div class="container w-full px-6 md:px-0 md:w-3/4 mx-auto mt-6">
        <h1 class="text-2xl font-semibold text-Ebony900">Laporan Mitra</h1>
    </div>

    <div class="container w-full px-6 md:px-0 md:w-3/4 mx-auto rounded-lg mt-8">
        <!-- Filter Tabs -->
         
        <div class="flex flex-wrap items-center gap-4 mb-4">
            <a href="{{ route('laporan.status', ['status' => 'semua']) }}">
                <button
                    class="w-fit px-4 py-2 font-medium rounded-full {{ request()->route('status') === 'semua' || is_null(request()->route('status')) ? 'active-button' : 'text-Ebony200' }}">
                    Semua
                </button>
            </a>
            <a href="{{ route('laporan.status', ['status' => 'terima']) }}">
                <button
                    class="w-fit px-4 py-2 font-medium rounded-full {{ request()->route('status') === 'terima' ? 'active-button' : 'text-Ebony200' }}">
                    Diterima
                </button>
            </a>
            <a href="{{ route('laporan.status', ['status' => 'revisi']) }}">
                <button
                    class="w-fit px-4 py-2 font-medium rounded-full {{ request()->route('status') === 'revisi' ? 'active-button' : 'text-Ebony200' }}">
                    Revisi
                </button>
            </a>
            <a href="{{ route('laporan.status', ['status' => 'tolak']) }}">
                <button
                    class="w-fit px-4 py-2 font-medium rounded-full {{ request()->route('status') === 'tolak' ? 'active-button' : 'text-Ebony200' }}">
                    Ditolak
                </button>
            </a>
            <a href="{{ route('laporan.status', ['status' => 'pengajuan']) }}">
                <button
                    class="w-fit px-4 py-2 font-medium rounded-full {{ request()->route('status') === 'pengajuan' ? 'active-button' : 'text-Ebony200' }}">
                    Pengajuan
                </button>
            </a>
        </div>        
        


        <div class="flex flex-row items-center w-full space-x-4 mb-3 mt-10 justify-between">
            <div
                class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-2 space-y-4 lg:space-y-0 w-full">
                <div class="flex flex-col md:flex-row md:space-x-4 w-full space-y-4 md:space-y-0">

                <form method="GET" action="{{ route('laporan.filter') }}" class="flex flex-wrap lg:flex-nowrap lg:flex-row w-full lg:gap-3">
                @csrf

                    <select
                    name="year" class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white flex-grow lg:flex-grow-0 lg:w-1/2">
                    @for ($i = 2000; $i <= date('Y'); $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                    </select>
                    <select
                      name="kuartal"  class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white flex-grow lg:flex-grow-0 lg:w-full">
                        <option value="1" >Kuartal 1 (Jan, Feb, Maret)</option>
                        <option value="2" >Kuartal 2 (April, Mei, Juni)</option>
                        <option value="3" >Kuartal 3 (Juli, Aug, Sep)</option>
                        <option value="4">Kuartal 4 (Oct, Nov, Des)</option>
                    </select>
                    <button
                       type="submit" class="bg-AccentRed900 hover:bg-red-700 text-white px-4 py-2 rounded-lg lg:w-fit text-nowrap">Terapkan
                        filter</button>
                        </form>

                </div>
                <div
                    class="flex flex-col pt-3 md:pt-0 md:flex-row md:space-x-4 lg:pt-0 w-full md:w-auto lg:w-fit lg:ml-3.5 space-y-4 md:space-y-0 lg:justify-end">
                    <button
                        class="bg-white hover:bg-Green50 text-Green600 border border-Neutral300 px-4 py-2 rounded-lg flex items-center lg:gap-1 gap-2 justify-center flex-grow lg:flex-grow-0 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        <p>Unduh .csv</p>
                    </button>
                    <a href="{{route('export.pdf')}}">
                    <button
                    
                        class="bg-white hover:bg-AccentRed100 text-AccentRed900 border border-Neutral300 px-4 py-2 rounded-lg flex items-center lg:gap-1 gap-2 justify-center flex-grow lg:flex-grow-0 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        <p>Unduh .pdf</p>
                    </button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('laporan.search') }}" >
        @csrf
        <div class="mb-8">
        <input type="text" name="search" placeholder="Cari"
                             class="w-full px-4 py-2 rounded-lg border border-gray-300"
                             value="{{ request('search') }}">
        </div>
       </form>


        <!-- Table -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-16">
            <table class="w-full text-left rtl:text-right">
                <thead class="text-sm uppercase bg-white text-Gray900 border border-Neutral300">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Judul
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Lokasi
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Realisasi
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Tgl Realisasi
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Laporan Dikirim
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Status
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <button class="text-Neutral700 hover:text-gray-900">
                                AKSI
                            </button>
                        </th>
                    </tr>
                </thead>

                <tbody class="text-Neutral700 text-sm whitespace-nowrap">
                    @foreach($laporan as $item)
                    <tr class="bg-white border-b border-Neutal200">
                        <th scope="row" class="px-6 py-4 font-normal">{{$item->judul}}</th>
                        <td class="px-6 py-4">{{$item->proyek->kecamatan}}</td>
                        <td class="px-6 py-4">Rp.{{number_format($item->realisasi, 0, ',', ',')}}</td>
                        <td class="px-6 py-4">{{$item->tanggal}} {{$item->bulan}} {{$item->tahun}}</td>
                        <td class="px-6 py-4">{{$item->releaseDay}} {{$item->releaseMonth}} {{$item->releaseYear}}</td>
                        <td class="px-6 py-4">
                            @if($item->status === 'terima')
                            <span class="bg-Success50 text-Success700 py-1 px-3 rounded-full text-xs">Diterima</span>
                            @elseif($item->status === 'draf')
                            <span class="bg-Gray100 text-Gray700 py-1 px-3 rounded-full text-xs">Draf</span>
                            @elseif($item->status === 'revisi')
                            <span class="bg-Warning50 text-Warning700 py-1 px-3 rounded-full text-xs">Revisi</span>
                            @elseif($item->status === 'pengajuan')
                            <span class="bg-Blue50 text-Blue500 py-1 px-3 rounded-full text-xs">Pengajuan</span>
                            @elseif($item->status === 'tolak')
                            <span
                                class="bg-AccentRed100 text-AccentRed300 text- py-1 px-3 rounded-full text-xs">tolak</span>
                            @endif

                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('laporan.show', $item->id)}}" class="text-Ebony300 hover:text-Ebony900">
                                <!-- Eye Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach

            </table>
            <div
                class="flex items-center justify-between bg-white px-6 py-3  rounded-b-lg border-b border-l border-r border-Neutral300">
                @if ($laporan->hasPages())
                <div class="flex items-center justify-between w-full">
                    {{-- Pagination Links --}}
                    <div class="w-full">
                        {{ $laporan->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>

    <script>


        function toggleActive(selectedId) {
            // Hapus kelas aktif dari semua tombol
            document.querySelectorAll('.btn').forEach(function (button) {
                button.classList.remove('bg-Blue700', 'text-white');
                button.classList.add('text-Ebony100');
            });

            // Tambahkan kelas aktif ke tombol yang dipilih
            const selectedButton = document.getElementById(selectedId);
            selectedButton.classList.add('bg-Blue700', 'text-white');
            selectedButton.classList.remove('text-Ebony100');
        }

    </script>



    @endif
    </main>

<x-footer-admin></x-footer-admin>



</x-app-layout>
