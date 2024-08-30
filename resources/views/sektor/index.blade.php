<x-app-layout>
    @include('components.navbar-admin')

    <div class="container w-full md:w-3/4 px-6 md:px-0 my-6 mx-auto p-5 flex items-center space-x-2">
        <div class="flex items-center space-x-2 mb-4">
            <a href="/dashboard" class="flex items-center text-Ebony100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
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
            <span class="text-sm font-medium text-AccentRed900 bg-red-100 px-2 py-1 rounded-md">Sektor</span>
        </div>
    </div>

    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto mt-6 flex flex-row justify-between">
        <h1 class="text-2xl font-semibold text-gray-800">Sektor</h1>
        <a href="{{route('sektor.create')}}" class="px-5 p-2 bg-AccentRed900 text-sm md:text-base text-white rounded-lg hover:bg-red-700">+ Buat
            Sektor Baru</a>
    </div>

    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto rounded-lg mt-4">

        <!-- Search Bar -->
        <form action="{{ route('sektor.search', ['status' => 'semua']) }}" method="GET" class="w-full">
            @csrf
        <div class="mb-6">
        <input type="text"  name="search" value="{{ request('search') }}"  placeholder="Cari" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            
            </div>
                      </form>

        @if (session('success'))
    <div class="bg-Green50 text-Green600 px-4 py-2 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @elseif(session('delete'))
    <div class="bg-AccentRed100 text-AccentRed900 px-4 py-2 rounded-lg mb-4">
        {{ session('delete') }}
    </div>
@endif
        <!-- Table -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-16">
            <table class="w-full text-left rtl:text-right">
                <thead class="text-sm uppercase bg-gray-50 text-Gray900 border border-Neutral200">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Nama sektor
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Deskripsi sektor
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            <div class="flex items-center">
                                Jumlah Program
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold text-center">
                            <button class="text-Neutral700 hover:text-gray-900">
                                AKSI
                            </button>
                        </th>
                    </tr>
                </thead>

                <tbody class="text-Neutral700 text-sm">

                    @foreach($sektor as $item)
                    <tr class="bg-white border border-Neutral200">
                        <th scope="row" class="px-6 py-4 font-normal">
                            {{$item->nama_sektor}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->deskripsi_sektor}}

                        </td>
                        <td class="px-6 py-4">
                            {{$item->programs_count}}
                        </td>
                        <td class="px-6 py-4 space-x-3 justify-center flex whitespace-nowrap">
                            <div class="flex items-center gap-4">
                                <a href="{{ route('sektor.detail', $item->id) }}"
                                    class="text-Ebony300 hover:text-Ebony900">
                                    <!-- Eye Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>
                                <a href="{{ route('sektor.edit', $item->id) }}"
                                    class="text-Ebony300 hover:text-Ebony900">
                                    <!-- Pencil Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


            </table>
            <div
                class="flex items-center justify-between bg-white px-6 py-3  rounded-b-lg border-b border-l border-r border-Neutral300">
                @if ($sektor->hasPages())
                <div class="flex items-center justify-between w-full">
                    {{-- Pagination Links --}}
                    <div class="w-full">
                        {{ $sektor->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
