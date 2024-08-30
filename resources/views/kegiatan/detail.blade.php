<x-app-layout>
    @if(Auth::user()->level === 'admin')
    @include('components.navbar-admin')

    <div class="bg-cover bg-no-repeat h-64 md:h-80 bg-center relative"
        style="background-image: url( {{ asset('images/dashboard-img.png') }} )">
        <div class="container md:w-3/4 mx-auto p-5 flex flex-row items-start justify-between">
            <div class="flex items-center space-x-2">
                <a href="/dashboard" class="flex items-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </a>
                <a class="flex items-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
                <a href="{{route('kegiatan.index')}}">
                    <span class="text-sm font-medium px-2 py-1 rounded-md text-white">Kegiatan</span>
                </a>
                <a class="flex items-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
                <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Detail</span>
            </div>
            <a href="{{route('kegiatan.edit', $kegiatan->id) }}" class="px-4 py-2 bg-AccentRed900 hover:bg-red-700 text-white rounded-lg flex justify-center text-sm md:text-base items-center text-nowrap gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>                  
                Ubah Kegiatan
            </a>
        </div>

        <div class="z-10 p-5 container w-full md:w-3/4 mx-auto">
            <div class="mt-[50px] ml-5 md:ml-0 md:mt-[100px] mb-16">
                <h1 class="text-3xl md:text-4xl font-semibold text-white">{{$kegiatan->judul}}</h1>
                <p class="text-xl md:text-2xl font-regular mt-2 text-white">
                    <div class="flex text-white">
                        <p class="mx-1">{{ $kegiatan->day }}</p>
                        <p class="mx-1">{{ $kegiatan->month }}</p>
                        <p class="mx-1">{{ $kegiatan->year }}</p>
                    </div>
                </p>
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <div class="container md:w-3/4 mx-auto py-10">
        <div class="bg-white shadow-xl rounded py-10 px-6 md:px-0 space-y-5 flex flex-col justify-center items-center">
            <p class="text-base leading-7">
                {!!$kegiatan->deskripsi1 !!}
            </p>
            <img class="bg-gray-200 w-full md:w-1/2 h-96 rounded-xl flex justify-center overflow-hidden object-cover items-center"
                src="{{ asset('storage/img/kegiatan/'. $kegiatan->gambar_kegiatan) }}" alt=""></img>
            <p class="text-base leading-7">
                {!!$kegiatan->deskripsi2!!}
            </p>
            <div class="flex flex-wrap justify-center md:self-start items-center gap-2 pl-0 md:pl-10">
                <p class="text-Blue font-semibold mb-2.5">Tags : </p>
                @foreach(json_decode($kegiatan->tags, true) as $tag)
                <span class="text-sm font-semibold text-Blue bg-Neutral200 px-2 py-1 rounded-full mb-2">{{ $tag }}</span>
                @endforeach
            </div>
        </div>
    </div>
    <x-footer></x-footer>

    @else

    @include('components.navbar-mitra')


    <div class="flex flex-col items-center justify-center w-full min-h-screen bg-white">
        <h1 class="text-4xl font-bold text-AccentRed900 mb-4">404</h1>
        <p class="text-lg text-Ebony900 mb-4">Oops! Halaman yang Anda cari tidak ditemukan.</p>
        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-AccentRed900 text-white rounded-lg">Kembali ke
            Dashboard</a>
    </div>

    <x-footer></x-footer>

    @endif
</x-app-layout>
