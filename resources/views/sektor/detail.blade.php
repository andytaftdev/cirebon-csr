<x-app-layout>

    @include('components.navbar-admin')


    <!-- Header Sektor -->
    <div class="bg-cover h-72 md:h-96 bg-no-repeat bg-center relative"
        style="background-image: url('{{ asset('storage/img/sektor/'. $sektor->gambar_sektor)}}')">
        <div class="container w-full md:w-3/4 mx-auto p-5 flex flex-row items-center justify-between">
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
                <a href="{{route('sektor.index')}}">
                    <span class="text-sm font-medium px-2 py-1 rounded-md text-white">Sektor</span>
                </a>
                <a class="flex items-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
                <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Detail</span>
            </div>
            <a href="{{route('sektor.edit', $sektor->id) }}" class="px-4 py-2 bg-AccentRed900 hover:bg-red-700 text-white rounded-lg flex justify-center items-center text-nowrap gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>                  
                Ubah Sektor
            </a>
        </div>

        <div class="z-10 p-5 container w-full md:w-3/4 mx-auto">
            <div class="mt-[70px] md:mt-[150px] mb-20">
                <h1 class="text-3xl md:text-4xl font-semibold text-white">{{$sektor->nama_sektor}}</h1>
                <p class="text-xl md:text-2xl font-regular mt-2 text-white">{{$sektor->deskripsi_sektor}}</p>
            </div>
        </div>
    </div>

    <!-- Tabel Program -->
    <div class="container w-full md:w-3/4 mx-auto p-4 md:p-0 md:mb-6">
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mt-10">Program</h2>
    </div>

    <div class="container w-full md:w-3/4 mx-auto relative overflow-x-auto shadow-lg sm:rounded-lg mt-4 mb-16">
        <table class="w-full text-left rtl:text-right">
            <thead class="text-sm uppercase bg-white text-Gray900">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Nama Program
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        <div class="flex items-center">
                            Deskripsi Program
                        </div>
                    </th>
                </tr>
            </thead>

            <tbody class="text-Neutral700 text-sm whitespace-nowrap">
                @foreach($programs as $item)
                <tr class="bg-white border border-Neutral200">
                    <th scope="row" class="px-6 py-4 font-normal">{{$item->nama_program}}</th>
                    <td class="px-6 py-4">{{$item->deskripsi}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
