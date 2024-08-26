<x-app-layout>
@include('components.navbar-admin')

<!-- Bagian Header dengan Icon Home -->
<div class="flex flex-col w-full min-h-screen">
    <div class="flex-grow p-7 mx-auto w-full max-w-screen-2xl h-full">
        <!-- Breadcrumb -->
        <div class="flex items-center space-x-2 mb-4">
            <a href="#" class="flex items-center text-Ebony100">
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

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mt-10 space-y-4 md:space-y-0">
            <h2 class="text-2xl font-bold text-Ebony900 my-0">Mitra</h2>
            <a href="{{route('identity.create')}}">
            <button class="bg-AccentRed900 text-white text-sm flex justify-center items-center px-5 py-3 rounded-lg gap-2">+
                Buat Mitra Baru</button>
            </a>
        </div>

        <div class="container mx-auto rounded-lg mt-6">
            <!-- Search Bar -->

            <div class="w-full flex justify-between items-center space-x-7 my-7">
                <!-- Search Bar -->
                <div class="w-9/12">
                    <input type="text" placeholder="Cari" class="w-full px-4 py-2 border border-Neutral300 rounded-lg">
                </div>
                <!-- Option Dropdown -->
                <div class="w-3/12">
                    <select class="w-full px-4 py-2 border border-Neutral300 rounded-lg">
                        <option value="Q2">Terbaru</option>
                    </select>
                </div>

            </div>


            <!-- Table -->
            <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th
                                class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                Foto
                            </th>
                            <th
                                class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                Nama
                            </th>
                            <th
                                class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                Nama PT
                            </th>
                            <th
                                class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                Deskripsi
                            </th>
                            <th
                                class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                Tanggal Terdaftar
                            </th>
                            <th
                                class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <!-- Row for Published Status -->
                         @foreach($mitra as $item)
                         @php
                              $date = $item->created_at;
                             if($date === null) {
                             $item->month = '-';
                             $item->day = '-';
                             $item->year = '-';
                           } else {
                               $carbonDate = \Carbon\Carbon::parse($date);
                              $item->month = $carbonDate->format('F');
                             $item->day = $carbonDate->format('d');
                             $item->year = $carbonDate->format('Y');
                                  }
                            @endphp

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-Ebony300">
                                <!-- Image Placeholder -->
                                <div class="w-48 h-24 rounded-md"
                                    style="background-image: url('{{ asset('storage/img/profile/'. $item->mitra_logo) }}');"></div>
                            </td>
                            <td class="px-6 py-4 text-sm text-Ebony300 whitespace-normal break-words max-w-xs">
                                {{$item->nama_mitra}}
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-sm text-Ebony300 max-w-xs truncate">
                            {{$item->nama_pt}}

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-Ebony300">
                            {{$item->deskripsi}}

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-Ebony300">
                            <div class="flex">
                                <p class="mx-1">{{ $item->day }}</p>
                                <p class="mx-1">{{ $item->month }}</p>
                                <p class="mx-1">{{ $item->year }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if($item->user->email_verified_at === null)
                                <span
                                    class="px-2 p-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-AccentRed100 text-AccentRed300">
                                    Non-Aktif
                                </span>
                                @else
                                <span
                                    class="px-2 p-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-Green50 text-Green600">
                                    Aktif
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
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
                        <!-- Row for Draft Status -->

                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between py-4 px-6 bg-white border-t">
            @if ($mitra->hasPages())
    <div class="flex items-center justify-between w-full">
        {{-- Pagination Links --}}
        <div class="w-full">
            {{ $mitra->links() }}
        </div>
    </div>
@endif
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</div>

</x-app-layout>
