<x-app-layout>

</x-app-layout>

<x-app-layout>
    @if(Auth::user()->level === 'admin')
    @include('components.navbar-admin')

<!-- Header Sektor -->
<div class="bg-cover bg-no-repeat bg-center relative"
    style="background-image: url( {{ asset('images/dashboard-img.png') }} )">
    <div class="container mx-auto p-5 flex flex-row items-center justify-between">
        <div class="flex items-center space-x-2 mb-4">
            <!-- Navigation -->
            <a href="#" class="flex items-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </a>
            <!-- Breadcrumbs -->
            <a class="flex items-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
            <span class="text-sm font-medium text-white px-2 py-1 rounded-md">Kegiatan</span>
            <a class="flex items-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
            <span class="text-sm font-medium text-AccentRed900 bg-red-100 px-2 py-1 rounded-md">Detail</span>
        </div>
        <!-- Button -->
        <a href="{{ route('kegiatan.edit', $kegiatan->id) }}">
        <button class="bg-AccentRed900 text-white text-sm flex justify-center items-center px-5 py-3 rounded-lg gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
            Ubah Kegiatan
        </button>
        </a>

    </div>

    <div class="z-10 p-5 container mx-auto">
        <div class="mb-10">
            <h1 class="text-4xl font-semibold text-white">{{$kegiatan->judul}}</h1>
            <p class="text-2xl font-regular mt-4 ">
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
<div class="container mx-auto py-10">
    <div class="bg-white shadow-xl rounded p-10 space-y-10 flex flex-col justify-center items-center">
        <p class="text-base leading-7">
        {!!$kegiatan->deskripsi1 !!}
        </p>
        <img class="bg-gray-200 w-1/2 h-96 rounded-xl flex justify-center items-center" src="{{ asset('images/pp.jpg') }}" alt=""></img>
        <p class="text-base leading-7">
        {!!$kegiatan->deskripsi2!!}

        </p>
        <div class="flex justify-start items-center space-x-2">
            <p class="text-Blue font-semibold">Tags : </p>
            @foreach(json_decode($kegiatan->tags, true) as $tag)
             <span class="text-sm font-semibold text-Blue bg-Neutral200 px-2 py-1 rounded-full">{{ $tag }}</span>
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
        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-AccentRed900 text-white rounded-lg">Kembali ke Dashboard</a>
    </div>
    
    <x-footer></x-footer>

@endif


</x-app-layout>