

<x-app-layout>
@include('components.navbar-admin')

<div class="container mx-auto p-5 flex items-center space-x-2">
    <a href="#" class="flex items-center text-Ebony100">
        <ion-icon name="home-outline"></ion-icon>
    </a>
    <ion-icon class="text-Ebony100" name="chevron-forward-outline"></ion-icon>
    <span class="text-sm font-medium px-2 py-1 rounded-md text-Ebony100">Proyek</span>
    <ion-icon class="text-Ebony100" name="chevron-forward-outline"></ion-icon>
    <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Detail</span>
</div>

<div class="container mx-auto mt-6">
    <!-- Header -->
    <h2 class="text-2xl font-semibold text-Gray900 mb-6">Detail Laporan</h2>
</div>

<div class="container mx-auto bg-white p-6 flex flex-col rounded-lg shadow-md mt-6 mb-4">
    <!-- Tags -->
    <div class="flex space-x-4 mb-4">
    @if($proyek->status === 'terbit')
    <span class="inline-block font-medium bg-Success50 text-Success700 text-sm px-3 py-1 rounded-full">Terbit</span>
    @else
    <span class="inline-block font-medium bg-Warning50 text-Warning700 text-sm px-3 py-1 rounded-full">Draf</span>
    @endif
        <span class="inline-block font-medium bg-Gray100 text-Gray700 text-sm px-3 py-1 rounded-full">{{$sektor->nama_sektor}}</span>
        <span class="inline-block font-medium bg-Gray100 text-Gray700 text-sm px-3 py-1 rounded-full">{{$program->nama_program}}</span>
    </div>

    <div class="flex flex-row">
        <div class="sm:bg-Red100 p-4 rounded-full mr-4 flex items-center justify-center">
            {{-- ICON --}}
            <ion-icon class="w-6 h-6 text-AccentRed900" name="briefcase-outline"></ion-icon>
        </div>
        <div class="flex items-center justify-center">
            <h3 class="text-2xl font-semibold text-Gray900 mb-1">Pengadaan sarana keterampilan Olahan Pangan</h3>
        </div>
    </div>

    <div class="bg-Neutral200 w-full h-[2px] my-5 rounded-full"></div>

    <div class="mx-auto w-full bg-no-repeat bg-contain h-[500px] mb-6" style="background-image: url('{{ asset('storage/img/proyek/'. $proyek->gambar_proyek) }}');">

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
        <div class="p-4 space-y-2 border-l-4 border-l-AccentRed900 bg-[#FFF1F0] rounded-lg">
            <h4 class="text-sm font-reguler text-Gray900">Tanggal</h4>
            <p class="text-md font-semibold text-Gray900">
                {{$proyek->firstDay}} {{$proyek->firstMonth}} {{$proyek->firstYear}}
                -
                {{$proyek->lastDay}} {{$proyek->lastMonth}} {{$proyek->lastYear}}

            </p>
        </div>
        <div class="p-4 space-y-2 border-l-4 border-l-AccentRed900 bg-[#FFF1F0] rounded-lg">
            <h4 class="text-sm font-reguler text-Gray900">Kecamatan</h4>
            <p class="text-md font-semibold text-Gray900">Kec. {{$proyek->kecamatan}}</p>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-semibold text-Gray900 mb-2">Rincian Laporan</h2>
        <p class="text-Gray900 leading-relaxed mb-3">
            {{$proyek->deskripsi1}}
        </p>
        <p class="text-Gray900 leading-relaxed">
        {{$proyek->deskripsi2}}
        </p>
    </div>

    <div class="bg-Neutral200 w-full h-[2px] my-5 rounded-full"></div>

    <h1 class="font-semibold text-2xl">Mitra Yang Berpartisipasi</h1>

    <div class="mt-6 bg-white border border-Neutral200 rounded-lg overflow-hidden">
        <table class="min-w-full bg-white overflow-x-auto">
            <thead class="bg-white border-b rounded-t-lg"
                <tr>
                    <th class="text-left px-6 py-3 text-sm text-Gray900 font-semibold uppercase tracking-wider">
                        Nama Mitra
                    </th>
                    <th class="text-left px-6 py-3 text-sm text-Gray900 font-semibold uppercase tracking-wider">
                        Email
                    </th>
                    <th class="text-left px-6 py-3 text-sm text-Gray900 font-semibold uppercase tracking-wider">
                        No. Telepon
                    </th>
                    <th class="text-left px-6 py-3 text-sm text-Gray900 font-semibold uppercase tracking-wider">
                        Tgl Mulai
                    </th>
                    <th class="text-left px-6 py-3 text-sm text-Gray900 font-semibold uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($idUser as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-Gray700">{{$item->identity->nama_mitra}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-Gray700">{{$item->email}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-Gray700">{{$item->identity->nomor_hp}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-Gray700">
                        1 Juli 2024
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <div class="flex items-center">
                                    <a href="{{ route('identity.detailMitra', $item->id) }}" class="text-Ebony300 hover:text-Ebony900">
                                        <!-- Eye Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

</x-app-layout>


