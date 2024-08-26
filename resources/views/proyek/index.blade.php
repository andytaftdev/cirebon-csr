
<x-app-layout>
@include('components.navbar-admin')


<!-- Bagian Header dengan Icon Home -->
<div class="container mx-auto p-5 flex items-center space-x-2">
    <a href="#" class="flex items-center text-Ebony100">
        <ion-icon name="home-outline"></ion-icon>
    </a>
    <ion-icon class="text-Ebony100" name="chevron-forward-outline"></ion-icon>
    <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Proyek</span>
</div>

<div class="container mx-auto mt-6 flex flex-row justify-between items-center">
    <h1 class="text-2xl font-semibold text-Ebony900">Proyek</h1>
    <a href="{{route('proyek.create')}}"><button class="bg-AccentRed900 text-white px-5 py-3 rounded-lg">+ Buat Proyek Baru</button></a>
</div>

<div class="container mx-auto rounded-lg mt-6">
    <!-- Filter Tabs -->
    <div class="flex items-center space-x-4 mb-4">
    <a href="{{ route('proyek.filter', ['status' => 'semua']) }}">
        <button class="px-4 py-2 font-medium rounded-full {{ request()->route('status')  === 'semua' ? 'active-button' : 'text-Ebony200' }}">
            Semua
        </button>
    </a>
    <a href="{{ route('proyek.filter', ['status' => '1']) }}">
        <button class="px-4 py-2 font-medium rounded-full {{ request()->route('status')  === '1' ? 'active-button' : 'text-Ebony200' }}">
            Terbit
        </button>
    </a>
    <a href="{{ route('proyek.filter', ['status' => '0']) }}">
        <button class="px-4 py-2 font-medium rounded-full {{ request()->route('status')  === '0' ? 'active-button' : 'text-Ebony200' }}">
        Draf
        </button>
    </a>
    </div>

    <!-- Dropdown Filters -->
    <div class="flex flex-row justify-center items-center w-full space-x-2 mb-6">
        <div class="w-2/3 flex flex-row items-center justify-center space-x-2">
            <select class="px-4 py-2 border w-1/3 border-Neutral300 rounded-lg">
            <option value="2024">2024</optin>
            <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
            <select class="px-4 py-2 border w-1/3 border-Neutral300 rounded-lg">
                <option value="Q2">Kuartal 2 (April, Mei, Juni)</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
            <select class="px-4 py-2 border w-1/3 border-Neutral300 rounded-lg">
                <option value="Q2">Sektor</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
        </div>
        
        <div class="w-1/3 flex flex-row items-center justify-center space-x-2">
            <button class="px-4 py-2 bg-AccentRed900 text-white rounded-lg hover:bg-red-900">Terapkan filter</button>
            
            <button class="px-4 py-2 bg-white text-YellowGreen600 rounded-lg border border-Neutral300">
                <ion-icon name="download-outline"></ion-icon> Unduh .csv
            </button>

            <button class="px-4 py-2 bg-white text-AccentRed900 rounded-lg border border-Neutral300">
                <ion-icon name="download-outline"></ion-icon> Unduh .pdf
            </button>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="mb-6">
        <input type="text" placeholder="Cari" class="w-full px-4 py-2 rounded-lg border border-gray-300">
    </div>

    <!-- Table -->
    <div class="relative overflow-x-auto sm:rounded-lg border border-Neutral200 mb-16">
        <table class="w-full text-left rtl:text-right">
            <thead class="text-sm uppercase bg-white text-Gray900 border-b border-b-Neutral200">
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
                            Jumlah Mitra
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        <div class="flex items-center">
                            Tgl Mulai
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        <div class="flex items-center">
                            Tgl Akhir
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        <div class="flex items-center">
                            Tgl Diterbitkan
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

            <tbody class="text-Neutral700 text-sm">
                @foreach($proyek as $item)
                <tr class="bg-white border-b border-Neutral200">
                    <th scope="row" class="px-6 py-4 font-normal">{{$item->nama_proyek}}</th>
                    <td class="px-6 py-4">{{$item->kecamatan}}</td>
                    <td class="px-6 py-4">{{$item->jumlah_mitra}}</td>
                    <td class="px-6 py-4">
                    {{$item->firstDay}} {{$item->firstMonth}} {{$item->firstYear}}
                    </td>
                    <td class="px-6 py-4">
                    {{$item->lastDay}} {{$item->lastMonth}} {{$item->lastYear}}
                    </td>
                    <td class="px-6 py-4">
                    {{$item->releaseDay}} {{$item->releaseMonth}} {{$item->releaseYear}}
                    </td>

                    <td class="px-6 py-4">
                        @if($item->status === 'terbit')
                        <span class="bg-Success50 text-Success700 py-1 px-3 rounded-full text-xs">Terbit</span>
                        @else
                        <span class="bg-Warning50 text-Warning700 py-1 px-3 rounded-full text-xs">Draf</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                    <div class="flex items-center gap-4">
                                    <a href="{{ route('proyek.show', $item->id) }}" class="text-Ebony300 hover:text-Ebony900">
                                        <!-- Eye Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                </div>
                    </td>
                </tr>
                @endforeach

                <tr class="bg-white border-b border-Neutral200">
                    <th scope="row" class="px-6 py-4 font-normal"></th>
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        1 Juli 2024	
                    </td>
                    <td class="px-6 py-4">
                        1 Juli 2024	
                    </td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-Warning50 text-Warning700 py-1 px-3 rounded-full text-xs">Draf</span>
                    </td>
                    <td class="px-6 py-4">
                        <button class="text-Neutral700">
                            <ion-icon class="h-5 w-5" name="eye-outline"></ion-icon>
                        </button>
                    </td>
                </tr>

                <tr class="bg-white border-b border-Neutral200">
                    <th scope="row" class="px-6 py-4 font-normal">
                        Pengadaan sarana keterampilan Olahan Pangan	
                    </th>
                    <td class="px-6 py-4">
                        Kec. Karangwareng	
                    </td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        1 Juli 2024	
                    </td>
                    <td class="px-6 py-4">
                        1 Juli 2024	
                    </td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-Warning50 text-Warning700 py-1 px-3 rounded-full text-xs">Draf</span>
                    </td>
                    <td class="px-6 py-4">
                        <button class="text-Neutral700">
                            <ion-icon class="h-5 w-5" name="eye-outline"></ion-icon>
                        </button>
                    </td>
                </tr>

                <tr class="bg-white border-b border-Neutral200">
                    <th scope="row" class="px-6 py-4 font-normal">
                        Pengadaan sarana keterampilan Olahan Pangan	
                    </th>
                    <td class="px-6 py-4">
                        Kec. Karangwareng	
                    </td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        1 Juli 2024	
                    </td>
                    <td class="px-6 py-4">
                        1 Juli 2024	
                    </td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-Warning50 text-Warning700 py-1 px-3 rounded-full text-xs">Draf</span>
                    </td>
                    <td class="px-6 py-4">
                        <button class="text-Neutral700">
                            <ion-icon class="h-5 w-5" name="eye-outline"></ion-icon>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex items-center justify-between bg-white px-6 py-3">
        @if ($proyek->hasPages())
    <div class="flex items-center justify-between w-full">
        {{-- Pagination Links --}}
        <div class="w-full">
            {{ $proyek->links() }}
        </div>
    </div>
@endif
        </div>
    </div>
</div>

<script>
    function toggleActive(selectedId) {
            // Hapus kelas aktif dari semua tombol
            document.querySelectorAll('.btn').forEach(function(button) {
                button.classList.remove('bg-Blue700', 'text-white');
                button.classList.add('text-Ebony100');
            });

            // Tambahkan kelas aktif ke tombol yang dipilih
            const selectedButton = document.getElementById(selectedId);
            selectedButton.classList.add('bg-Blue700', 'text-white');
            selectedButton.classList.remove('text-Ebony100');
        }

</script>

</x-app-layout>


