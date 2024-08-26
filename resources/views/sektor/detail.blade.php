<x-app-layout>

@include('components.navbar-admin')


    <!-- Header Sektor -->
    <div class="bg-cover bg-no-repeat bg-center relative" style="background-image: url( {{ asset('images/dashboard-img.png') }} )">
        <div class="container mx-auto p-5 flex flex-row items-center justify-between">
            <div class="flex items-center space-x-2">
                <a href="#" class="flex items-center text-white">
                    <ion-icon name="home-outline"></ion-icon>
                </a>
                <ion-icon class="text-white" name="chevron-forward-outline"></ion-icon>
                <span class="text-sm font-medium text-white">Sektor</span>
                <ion-icon class="text-white" name="chevron-forward-outline"></ion-icon>
                <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Detail</span>
            </div>
            <a href="#" class="px-4 py-2 bg-AccentRed900 text-white font-semibold rounded-lg">
                Ubah Sektor
            </a>
        </div>

        <div class="z-10 p-5 container mx-auto">
            <div class="mt-[150px] mb-20">
                <h1 class="text-4xl font-semibold text-white">{{$sektor->nama_sektor}}</h1>
                <p class="text-2xl font-regular mt-4 text-white">{{$sektor->deskripsi_sektor}}</p>
            </div>
        </div>
    </div>

    <!-- Tabel Program -->
    <div class="container mx-auto p-5">
        <h2 class="text-3xl font-semibold text-gray-800 mt-10">Program</h2>
    </div>

    <div class="container mx-auto relative overflow-x-auto shadow-lg sm:rounded-lg mt-4 mb-16">
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