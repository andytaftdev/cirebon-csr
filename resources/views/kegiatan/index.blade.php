<x-app-layout>
    @if(Auth::user()->level === 'admin')
    @include('components.navbar-admin')
    <!-- Bagian Header dengan Icon Home -->
    <div class="flex flex-col w-full md:w-3/4 mx-auto min-h-screen">
        <div class="flex-grow p-7 mx-auto w-full max-w-screen-2xl h-full">
            <!-- Breadcrumb -->
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
                <span class="text-sm font-medium text-AccentRed900 bg-red-100 px-2 py-1 rounded-md">Kegiatan</span>
            </div>

            <div
                class="flex flex-row justify-between items-start md:items-center mt-10 md:space-y-0">
                <h2 class="text-2xl font-semibold text-Ebony900 my-0">Kegiatan</h2>
                <a href="{{ route('kegiatan.create', $identity->id) }}"><button
                        class="bg-AccentRed900 hover:bg-red-700 text-white text-sm md:text-base flex justify-center items-center px-5 py-2 rounded-lg gap-2">+
                        Buat Kegiatan Baru</button> </a>
            </div>

            <div class="container mx-auto rounded-lg mt-8">
                <div class="flex items-center space-x-4 mb-4">
                    <a href="{{ route('kegiatan.filter', ['status' => 'semua']) }}">
                        <button
                            class="px-4 py-2 font-medium rounded-full {{ request()->route('status') === 'semua' || request()->route('status') === null ? 'active-button' : 'text-Ebony200' }}">
                            Semua
                        </button>
                    </a>
                    <a href="{{ route('kegiatan.filter', ['status' => '1']) }}">
                        <button
                            class="px-4 py-2 font-medium rounded-full {{ request()->route('status') === '1' ? 'active-button' : 'text-Ebony200' }}">
                            Terbit
                        </button>
                    </a>
                    <a href="{{ route('kegiatan.filter', ['status' => '0']) }}">
                        <button
                            class="px-4 py-2 font-medium rounded-full {{ request()->route('status') === '0' ? 'active-button' : 'text-Ebony200' }}">
                            Draf
                        </button>
                    </a>
                </div>                

                <div class="w-full flex justify-between items-center gap-3 my-7">
                    <!-- Search Bar -->
                    <form action="{{ route('kegiatan.filter', ['status' => 'semua']) }}" method="GET" class="w-full md:w-9/12">
                        @csrf
                    <input type="text" name="search" placeholder="Cari"
                             class="w-full px-4 py-2 border border-Neutral300 rounded-lg"
                             value="{{ request('search') }}">
                      </form>
                    <!-- Option Dropdown -->
                    <div class="w-full md:w-3/12">
                        <select class="w-full px-4 py-2 border border-Neutral300 rounded-lg">
                            <option value="Q2">Sektor</option>
                        </select>
                    </div>

                </div>

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
                <div class="mt-6 bg-white shadow-lg rounded-lg overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th
                                    class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                    Foto
                                </th>
                                <th
                                    class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                    Judul
                                </th>
                                <th
                                    class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th
                                    class="text-left px-6 py-3 text-xs font-semibold text-Ebony900 uppercase tracking-wider">
                                    Tgl Diterbitkan
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
                            @foreach($kegiatan as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-Ebony300">
                                    <!-- Image Placeholder -->
                                    <div class="w-48 h-24 rounded-md"
                                        style="background-image: url('{{ asset('storage/img/kegiatan/'. $item->gambar_kegiatan)}}');">
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-Ebony300 whitespace-normal break-words max-w-xs">
                                    {{$item->judul}}
                                </td>
                                <td class="px-6 py-4 whitespace-normal text-sm text-Ebony300 max-w-xs truncate">
                                    {!!$item->deskripsi!!}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-Ebony300 ">
                                    <div class="flex">
                                        <p class="mx-1">{{ $item->day }}</p>
                                        <p class="mx-1">{{ $item->month }}</p>
                                        <p class="mx-1">{{ $item->year }}</p>
                                    </div>


                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if($item->status === 1)
                                    <span
                                        class="px-2 p-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-Green50 text-Green600">
                                        Terbit
                                    </span>
                                    @else
                                    <span
                                        class="px-2 p-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-Yellow100 text-AccentRed300">
                                        Draf
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                    <div class="flex items-center gap-4">
                                        <a href="{{ route('kegiatan.detail', $item->id) }}"
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
                                        <a href="{{ route('kegiatan.edit', $item->id) }}"
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
                            <!-- Row for Draft Status -->

                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                <div
                    class="flex items-center justify-between bg-white px-6 py-3 mb-16 rounded-b-lg border-b border-l border-r border-gray-300">

                    @if ($kegiatan->hasPages())
                    <div class="flex items-center justify-between w-full">
                        {{-- Pagination Links --}}
                        <div class="w-full">
                            {{ $kegiatan->links() }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <script>
        // Example data (for demonstration)
        const laporanData = Array.from({
            length: 50
        }, (_, i) => {
            const status = i % 3 === 0 ? 'Diterima' : i % 2 === 0 ? 'Revisi' : 'Draf';
            let statusClass = '';

            // Determine the class based on the status
            if (status === 'Diterima') {
                statusClass = 'bg-green-100 text-green-600'; // Green color
            } else if (status === 'Revisi') {
                statusClass = 'text-yellow-700 bg-yellow-100'; // Yellow color
            } else if (status === 'Draf') {
                statusClass = 'text-gray-500 bg-gray-100'; // Gray color
            }

            return {
                judul: `Pengadaan sarana keterampilan Olahan Pangan ${i + 1}`,
                lokasi: `Kec. Karangwareng ${i + 1}`,
                realisasi: `Rp.${(i + 1) * 1000},000`,
                tglRealisasi: `1 Juli 2024`,
                laporanDikirim: `16 July`,
                status: status,
                statusClass: statusClass // Add the class to the data object
            };
        });

        let currentPage = 1;
        const itemsPerPage = 5;
        const totalPages = Math.ceil(laporanData.length / itemsPerPage);

        // Function to render the table rows for the current page
        function renderTableRows() {
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const itemsToDisplay = laporanData.slice(startIndex, endIndex);

            const tableBody = document.getElementById('mitra-table-body');
            tableBody.innerHTML = ''; // Clear previous rows

            itemsToDisplay.forEach(item => {
                const row = document.createElement('tr');
                row.className = 'border-gray-300 hover:bg-gray-100 border'

                row.innerHTML = `
                <td class="py-4 px-6 text-left">${item.judul}</td>
                <td class="py-4 px-6 text-left">${item.lokasi}</td>
                <td class="py-4 px-6 text-left">${item.realisasi}</td>
                <td class="py-4 px-6 text-left">${item.tglRealisasi}</td>
                <td class="py-4 px-6 text-left">${item.laporanDikirim}</td>
                <td class="py-4 px-6 text-left">
                    <span class="${item.statusClass} font-medium bg-gray-100 text-gray-700 py-1 px-3 rounded-full text-left text-xs">${item.status}</span>
                </td>
                <td class="py-4 px-6">
                    <a href="" class="text-gray-600 hover:text-gray-900">
                        <ion-icon class="h-5 w-5" name="eye-outline"></ion-icon>
                    </a>
                </td>
            `;

                tableBody.appendChild(row);
            });

            // Update the page number display
            document.getElementById('page-number').textContent = currentPage;
        }

        // Function to go to the next page
        function nextPage() {
            if (currentPage < totalPages) {
                currentPage++;
                renderTableRows();
            }
        }

        // Function to go to the previous page
        function previousPage() {
            if (currentPage > 1) {
                currentPage--;
                renderTableRows();
            }
        }

        // Function to update items per page
        function updateItemsPerPage() {
            const selectElement = document.getElementById('itemsPerPage');
            itemsPerPage = parseInt(selectElement.value);
            currentPage = 1; // Reset to the first page whenever items per page changes
            totalPages = Math.ceil(laporanData.length / itemsPerPage);
            renderTableRows();
        }

        // Listen for changes in the items per page dropdown
        document.getElementById('itemsPerPage').addEventListener('change', updateItemsPerPage);

        // Initial render
        renderTableRows();

    </script>
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
