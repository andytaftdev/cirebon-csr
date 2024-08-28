<x-app-layout>


@if (Auth::user()->level === 'mitra')

 @if (Auth::user()->profile_status === 0)
<div class="flex flex-col w-full min-h-screen">
    <div class="flex-grow p-7 mx-auto w-full max-w-screen-2xl h-full">
    
        <h2 class="text-2xl font-bold mb-6 mt-10 text-Ebony900">Lengkapi Profile</h2>

        <!-- Profile Update Form -->
        <div class="bg-white p-8 rounded-lg shadow-md max-w-screen-2xl mx-auto mt-6">
            <form action="{{route('identity.store')}}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6" enctype="multipart/form">
                @csrf



                <!-- Form Section -->
                <div class="col-span-1">
                <input type="number" name="id_user" hidden value="{{Auth::user()->id}}">

                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="nama_mitra">Nama Mitra<span
                                class="text-AccentRed900 ml-1">*</span></label>
                        <input class="w-full px-4 py-2 border border-Neutral300 rounded-lg" type="text" name="nama_mitra"
                            placeholder="Nama Mitra">
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="nama_pt">Nama PT<span
                                class="text-AccentRed900 ml-1">*</span></label>
                        <input class="w-full px-4 py-2 border border-Neutral300 rounded-lg" type="text" name="nama_pt"
                        value="{{Auth::user()->name}}">
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="no_telepon">No Telepon<span
                                class="text-AccentRed900 ml-1">*</span></label>
                        <input class="w-full px-4 py-2 border border-Neutral300 rounded-lg" type="text" name="nomor_hp"
                            placeholder="No Telepon">
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="email">Email<span
                                class="text-AccentRed900 ml-1">*</span></label>
                        <input class="w-full px-4 py-2 border border-Neutral300 rounded-lg" readonly type="email" name="email"
                            value="{{Auth::user()->email}}">
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="alamat">Alamat</label>
                        <textarea class="w-full px-4 py-2 border border-Neutral300 rounded-lg" name="alamat"
                            placeholder="Alamat"></textarea>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="deskripsi">Deskripsi</label>
                        <textarea class="w-full px-4 py-2 border border-Neutral300 rounded-lg" name="deskripsi"
                            placeholder="Deskripsi"></textarea>
                    </div>
                </div>
          
        </div>
       
        <!-- Buttons Section -->
        <div class="bg-white shadow-md rounded-lg p-4 px-10 mt-7 mb-20">
            <div class="flex w-full justify-center md:justify-end space-x-4">
                <button type="submit" class="px-4 py-2 bg-AccentRed900 text-white rounded-lg flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    Simpan
                </button>
            </div>
        </div>
        </form>
        @if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold"><i class="fas fa-ban"></i> Please fill the data as you should!</strong>
    <span class="block sm:inline">There are some errors:</span>
    <ul class="mt-2">
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>
    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-hidden="true">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.348 14.849a1 1 0 0 1-1.414 0L10 11.415l-2.934 2.934a1 1 0 1 1-1.414-1.414l2.934-2.934-2.934-2.934a1 1 0 0 1 1.414-1.414L10 8.585l2.934-2.934a1 1 0 0 1 1.414 1.414l-2.934 2.934 2.934 2.934a1 1 0 0 1 0 1.414z" />
        </svg>
    </button>
</div>
@endif

    </div>
</div>
    @else

@include('components.navbar-mitra')

<div class="relative w-full">
    <img src="{{ asset('images/dashboard-img.png') }}" alt="Image Dashboard"
        class="w-full h-60 md:h-64 lg:h-72 object-cover">
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-4 lg:p-0">
        <h1 class="text-2xl sm:text-3xl lg:text-4xl text-white font-bold">Selamat Datang di Dashboard CSR Kabupaten
            Cirebon</h1>
        <h2 class="text-base md:text-xl lg:text-2xl text-white mt-2">Lapor dan ketahui program CSR Anda</h2>
    </div>
</div>

<div class="container mx-auto mt-10 px-6">
    <div class="mt-12 mb-4">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-2 space-y-4 lg:space-y-0">
            <div class="flex flex-col md:flex-row md:space-x-4 w-full space-y-4 md:space-y-0">
                <select
                    class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white flex-grow lg:flex-grow-0 lg:w-1/2">
                    <option>2024</option>
                </select>
                <select
                    class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white flex-grow lg:flex-grow-0 lg:w-full">
                    <option>Kuartal 2 (April, Mei, Juni)</option>
                </select>
                <button class="bg-AccentRed900 hover:bg-red-700 text-white px-4 py-2 rounded-lg lg:w-fit text-nowrap">Terapkan
                    filter</button>
            </div>
            <div
                class="flex flex-col pt-3 md:pt-0 md:flex-row md:space-x-4 lg:pt-0 w-full md:w-auto lg:w-fit lg:ml-3.5 space-y-4 md:space-y-0 lg:justify-end">
               <a href="">
               <button
                    class="bg-white hover:bg-Green50 text-Green600 border border-Neutral300 px-4 py-2 rounded-lg flex items-center lg:gap-1 gap-2 justify-center flex-grow lg:flex-grow-0 text-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    <p>Unduh .csv</p>
                </button>
               </a> 
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

        <h1 class="text-xl md:text-2xl text-left text-Ebony900 my-6 font-bold">Data Statistik</h1>
    </div>


    <!-- Data Statistik Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Proyek CSR -->
        <div class="bg-Orange600 text-white rounded-xl p-5 flex flex-col relative">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-4">
                    <div class="bg-Orange50 w-8 h-8 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                            stroke="currentColor" class="size-5 text-Orange600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                        </svg>
                    </div>
                </div>
                <div class="text-base md:text-lg">Total Proyek CSR</div>
            </div>
            <div class="mt-3 p-3 bg-Orange300 border border-Orange100 rounded-lg">
                <div class="text-lg md:text-xl font-bold">{{$data['jumlah_proyek']}}</div>
            </div>
        </div>

        <!-- Proyek Terealisasi -->
        <div class="bg-Purple500 text-white rounded-xl p-5 flex flex-col relative">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-4">
                    <div class="bg-Purple50 w-8 h-8 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                            stroke="currentColor" class="size-5 text-Purple500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>
                    </div>
                </div>
                <div class="text-base md:text-lg">Proyek Terealisasi</div>
            </div>
            <div class="mt-3 p-3 bg-Purple200 border border-Purple100 rounded-lg">
                <div class="text-lg md:text-xl font-bold">{{$data['release_proyek']}}</div>
            </div>
        </div>

        <!-- Dana Realisasi CSR Mitra -->
        <div class="bg-Green600 text-white rounded-xl p-5 flex flex-col relative">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-4">
                    <div class="bg-Green50 w-8 h-8 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                            stroke="currentColor" class="size-5 text-Green600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>
                    </div>
                </div>
                <div class="text-base md:text-lg">Dana Realisasi CSR Mitra</div>
            </div>
            <div class="mt-3 p-3 bg-Green300 border border-Green100 rounded-lg">
                <div class="text-lg md:text-xl font-bold">Rp.{{number_format($data['dana_mitra'], 0, ',', ',')}}</div>
            </div>
        </div>
    </div>
</div>

<!-- Chart Section -->
<div class="container mx-auto w-full mb-20 mt-12 px-6">
    <h1 class="my-6 text-xl md:text-2xl font-bold mb-4">Realisasi Proyek CSR</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white rounded-lg shadow-md p-6 md:p-6 lg:p-8">
        <!-- Pie Chart -->
        <div>
            <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Persentase total realisasi berdasarkan
                sektor CSR</h2>
            <div id="pieChart"></div>
        </div>
        <!-- Bar Charts -->
        <div>
            <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Total realisasi sektor CSR</h2>
            <div id="barChart1"></div>
        </div>
        <div class="md:col-span-2">
            <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Total realisasi proyek CSR berdasarkan
                lokasi</h2>
            <div id="barChart2" class="w-full h-96 md:h-128 lg:h-full"></div>
        </div>
    </div>
</div>
{{-- End Chart Section --}}
<div class="container mx-auto px-6 py-8 mb-8">
    <div class="flex items-center justify-between">
        <h1 class="text-xl md:text-2xl font-bold text-Ebony900">Laporan Mitra</h1>
        <a href="{{route('laporan.create')}}">
        <button class="bg-AccentRed900 hover:bg-red-700 text-sm md:text-base text-white px-4 py-2 rounded-lg">
            + Buat Laporan Baru
        </button>

    </a>

    </div>

    <div class="mt-6">
        <div class="relative">
            <input type="text" class="w-full pl-6 pr-4 py-2 border border-Neutral300 rounded-lg" placeholder="Cari">
        </div>
    </div>

    <div class="relative overflow-x-auto rounded-lg shadow-md mt-7">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b">
                <tr>
                    <th scope="col" class="px-6 py-3 text-Ebony900 font-semibold">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3 text-Ebony900 font-semibold">
                        Lokasi
                    </th>
                    <th scope="col" class="px-6 py-3 text-Ebony900 font-semibold">
                        Realisasi
                    </th>
                    <th scope="col" class="px-6 py-3 text-Ebony900 font-semibold">
                        Tgl Realisasi
                    </th>
                    <th scope="col" class="px-6 py-3 text-Ebony900 font-semibold">
                        Laporan Dikirim
                    </th>
                    <th scope="col" class="px-6 py-3 text-Ebony900 font-semibold">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-Ebony900 font-semibold">
                        Aksi
                    </th>
                </tr>
            </thead>
            @foreach($laporan as $item)
            <tbody>
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
                            <span class="bg-AccentRed100 text-AccentRed300 text- py-1 px-3 rounded-full text-xs">tolak</span>
                            @endif

                        </td>
                        <td class="px-6 py-4">
                                    <a href="{{route('laporan.show', $item->id)}}" class="text-Ebony300 hover:text-Ebony900">
                                        <!-- Eye Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                    </td>
                    </tr>
            </tbody>
            @endforeach

        </table>
        <div class="pagination p-3 flex justify-center items-center border-t">
        </div>
    </div>

    <div class="flex justify-center items-center mt-7">
       <a href="{{route('laporan.index')}}">
       <div class="cursor-pointer flex justify-center items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="size-5 text-AccentRed900">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            <p class="text-AccentRed900 hover:text-red-700 text-sm md:text-base font-semibold">Muat lebih banyak</p>
        </div>
       </a> 
    </div>
</div>



<script>

var dataRealisasi = @json($data_realisasi);
        var categories = Object.keys(dataRealisasi);
          var seriesData = Object.values(dataRealisasi);



          var dataKec = @json($data_kecamatan);
        var categoriesKec = Object.keys(dataKec);
          var seriesKec = Object.values(dataKec);
    // Pie Chart Configuration
    var pieOptions = {
        series: seriesData,
        chart: {
            type: 'pie',
            height: 350
        },
        labels: categories,
        colors: ['#4E5BA6', '#7A5AF8', '#EE46BC', '#B42121', '#F95016'], // Adjust the colors as needed
        dataLabels: {
            enabled: false
        },
        tooltip: {
        y: {
            formatter: function (val) {
                return "Rp " + val.toLocaleString('id-ID');
            }
        }
    },
        responsive: [{
                breakpoint: 1279,
                options: {
                    chart: {
                        width: 300
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            },
            {
                breakpoint: 1023,
                options: {
                    chart: {
                        width: 300 // Adjust the width as needed
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            },
            {
                breakpoint: 768,
                options: {
                    chart: {
                        width: 500 // Adjust the width as needed
                    },
                    legend: {
                        position: 'right',
                    }
                }
            },
            {
                breakpoint: 565,
                options: {
                    chart: {
                        width: 470
                    },
                    legend: {
                        position: 'right'
                    }
                }
            },
            {
                breakpoint: 530,
                options: {
                    chart: {
                        width: 300
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            },
            {
                breakpoint: 375,
                options: {
                    chart: {
                        width: 250
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        ]
    };

    var pieChart = new ApexCharts(document.querySelector("#pieChart"), pieOptions);
    pieChart.render();

    // Bar Chart 1 Configuration
    var barOptions1 = {
        series: [{
            data: seriesData
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        tooltip: {
        y: {
            formatter: function (val) {
                return "Rp " + val.toLocaleString('id-ID');
            }
        }
    },
        plotOptions: {
            bar: {
                horizontal: true,
                distributed: true,
                dataLabels: {
                    position: 'center' // Position the data labels inside the bars
                }
            }
        },
        colors: ['#4E5BA6', '#7A5AF8', '#EE46BC', '#B42121', '#F95016'], // Adjust the colors as needed
        dataLabels: {
            enabled: true,
            style: {
                colors: ['#FFFFFF'] // Set the text color to white for visibility
            },
            formatter: function (val) {
                return 'Rp.' + val.toLocaleString(
                    'id-ID'); // Format the values with 'Rp.' and thousands separator
            }
        },
        xaxis: {
            categories: categories,
            labels: {
                show: false // Disable x-axis labels
            },
            axisBorder: {
                show: false // Optionally, hide the axis line
            },
            axisTicks: {
                show: false // Optionally, hide the axis ticks
            }
        },
        legend: {
            show: false
        }
    };

    var barChart1 = new ApexCharts(document.querySelector("#barChart1"), barOptions1);
    barChart1.render();

    // Bar Chart 2 Configuration
    var barOptions2 = {
        series: [{
            data: seriesKec // Replace with your actual data
        }],
        chart: {
            type: 'bar',
            height: 450,
        },
        tooltip: {
        y: {
            formatter: function (val) {
                return "Rp " + val.toLocaleString('id-ID');
            }
        }
    },
        plotOptions: {
            bar: {
                horizontal: true,
                distributed: true,
                dataLabels: {
                    position: 'center' // Position the data labels inside the bars
                }
            }
        },
        colors: ['#4E5BA6', '#7A5AF8', '#EE46BC', '#B42121', '#F95016', '#66C61C',
            '#16B364'
        ], // Adjust the colors as needed
        dataLabels: {
            enabled: true,
            style: {
                colors: ['#FFFFFF'] // Set the text color to white for visibility
            },
            formatter: function (val) {
                return 'Rp.' + val.toLocaleString(
                    'id-ID'); // Format the values with 'Rp.' and thousands separator
            }
        },
        xaxis: {
            categories: categoriesKec,
            labels: {
                show: false // Disable x-axis labels
            },
            axisBorder: {
                show: false // Optionally, hide the axis line
            },
            axisTicks: {
                show: false // Optionally, hide the axis ticks
            }
        },
        legend: {
            show: false
        }
    };

    var barChart2 = new ApexCharts(document.querySelector("#barChart2"), barOptions2);
    barChart2.render();

</script>
@endif
    @else
    @if (Auth::user()->profile_status === 0)
<div class="flex-grow p-7 mx-auto w-full max-w-screen-2xl h-full">

 
        <h2 class="text-2xl font-bold mb-6 mt-10 text-Ebony900">Lengkapi Profile</h2>
 
        <!-- Profile Update Form -->
        <div class="bg-white p-8 rounded-lg shadow-md max-w-screen-2xl mx-auto mt-6">
            <form class="flex flex-col gap-6" action="{{route('identity.store', Auth::user()->id)}}" method="POST">
                @csrf

 
                <!-- Form Section -->
                <div class="flex flex-col gap-4">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="name">Nama<span
                                class="text-AccentRed900 ml-1">*</span></label>
                        <input class="w-full px-4 py-2 border border-Neutral300 rounded-lg" type="text" name="nama_mitra"
                            placeholder="Nama">
                    </div>
                    <input type="number" name="id_user" hidden value="{{Auth::user()->id}}">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="email">Email<span
                                class="text-AccentRed900 ml-1">*</span></label>
                        <input class="w-full px-4 py-2 border border-Neutral300 rounded-lg" type="email" value="{{Auth::user()->email}}" readonly name="email"
                            placeholder="Email">
                    </div>
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="description">Deskripsi</label>
                        <textarea class="w-full px-4 py-2 border border-Neutral300 rounded-lg" name="deskripsi"
                            placeholder="Deskripsi"></textarea>
                    </div>
                </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> please fill the data as you should!</h5>
            <ul>
                @foreach ($errors->all() as $item)
                <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
        @endif
 
        <!-- Buttons Section -->
        <div class="bg-white shadow-md rounded-lg p-4 px-10 mt-7 mb-20">
            <div class="flex w-full justify-center md:justify-end space-x-4">
                <button type="submit" class="px-4 py-2 bg-AccentRed900 text-white rounded-lg flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    Simpan
                </button>
            </div>
        </div>
        </form>

 
    </div>
    @else

@include('components.navbar-admin')


<div class="relative w-full">
    <img src="{{ asset('images/dashboard-img.png') }}" alt="Image Dashboard"
        class="w-full h-60 md:h-64 lg:h-72 object-cover">
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-4 lg:p-0">
        <h1 class="text-2xl sm:text-3xl lg:text-4xl text-white font-bold">Selamat Datang di Dashboard CSR Kabupaten
            Cirebon</h1>
        <h2 class="text-base md:text-xl lg:text-2xl text-white mt-2">Lapor dan ketahui program CSR Anda</h2>
    </div>
</div>

<div class="container mx-auto mt-10 px-6">
    <div class="mt-0 mb-4">
        <div class="flex flex-wrap justify-between items-center mb-2">
            <div class="flex flex-wrap lg:flex-nowrap lg:flex-row w-full lg:gap-3">
                <!-- Dropdown 1 -->
                <div class="w-full py-2 sm:pr-2 lg:pr-0 sm:w-1/2 md:w-1/2 lg:">
                    <select class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white w-full">
                        <option>2024</option>
                    </select>
                </div>
                <!-- Dropdown 2 -->
                <div class="w-full py-2 sm:pl-2 lg:pl-0 sm:w-1/2 md:w-1/2 lg:">
                    <select class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white w-full">
                        <option>Kuartal 2 (April, Mei, Juni)</option>
                    </select>
                </div>
                <!-- Dropdown 3 -->
                <div class="w-full py-2 sm:pr-2 lg:pr-0 sm:w-1/2 md:w-1/2 lg:">
                    <select class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white w-full">
                        <option>Semua Sektor</option>
                    </select>
                </div>
                <!-- Dropdown 4 -->
                <div class="w-full py-2 sm:pl-2 lg:pl-0 sm:w-1/2 md:w-1/2 lg:">
                    <select class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white w-full">
                        <option>Semua Mitra</option>
                    </select>
                </div>
                <!-- Button Terapkan Filter Show Di Posisi lg, Hide di posisi selain lg -->
                <div class="w-full py-2 lg:w-1/6 xl:w-fit xl:mr-4 xl:block hidden">
                    <button
                        class="bg-AccentRed900 hover:bg-red-700 text-white px-4 py-2 mb-2 border-Neutral300 rounded-lg p-2 w-full text-nowrap">
                        Terapkan filter
                    </button>
                </div>
                <!-- Button Unduh .csv di posisi xl -->
                <div class="w-fit mt-2 xl:block hidden">
                    <button
                        class="bg-white hover:bg-Green50 text-Green600 border border-Neutral300 px-4 py-2 rounded-lg flex items-center gap-2 w-full justify-center text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        <p>Unduh .csv</p>
                    </button>
                </div>
                <!-- Button Unduh .pdf di posisi xl -->
                <div class="w-fit mt-2 xl:block hidden">
                    <button
                        class="bg-white hover:bg-AccentRed100 text-AccentRed900 border border-Neutral300 px-4 py-2 rounded-lg flex items-center gap-2 w-full justify-center text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        <p>Unduh .pdf</p>
                    </button>
                </div>
            </div>
            <div class="flex flex-col w-full md:flex-row md:space-x-4 lg:space-x-0 lg:justify-center lg:items-center lg:flex-row lg:flex xl:hidden lg:gap-3">
                <button class="bg-AccentRed900 text-white py-2 mb-2 rounded-lg w-full mt-2 md:w-1/3 lg:w-full text-nowrap">
                    Terapkan filter
                </button>
                <!-- Button Unduh .csv di posisi selain xl -->
                <div class="w-full mt-3 md:mt-0 py-2 md:w-1/3 lg:w-full lg:block xl:hidden">
                    <button
                        class="bg-white text-Green600 border border-Neutral300 px-4 py-2 rounded-lg flex items-center gap-2 w-full justify-center text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        <p>Unduh .csv</p>
                    </button>
                </div>
                <!-- Button Unduh .pdf di posisi selain xl -->
                <div class="w-full py-2 md:w-1/3 lg:w-full lg:block xl:hidden">
                    <button
                        class="bg-white text-AccentRed900 border border-Neutral300 px-4 py-2 rounded-lg flex items-center gap-2 w-full justify-center text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        <p>Unduh .pdf</p>
                    </button>
                </div>
            </div>
        </div>
        <h1 class="text-xl md:text-2xl text-left font-semibold text-Ebony900 my-6">Data Statistik</h1>
    </div>


    <!-- Data Statistik Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Proyek CSR -->
        <div class="bg-Orange600 text-white rounded-xl p-5 flex flex-col relative">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-4">
                    <div class="bg-Orange50 w-8 h-8 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                            stroke="currentColor" class="size-5 text-Orange600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                        </svg>
                    </div>
                </div>
                <div class="text-base md:text-lg">Total Proyek CSR</div>
            </div>
            <div class="mt-3 p-3 bg-Orange300 border border-Orange100 rounded-lg">
                <div class="text-lg md:text-xl font-bold">{{$data['jumlah_proyek']}}</div>
            </div>
        </div>

        <!-- Proyek Terealisasi -->
        <div class="bg-Purple500 text-white rounded-xl p-5 flex flex-col relative">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-4">
                    <div class="bg-Purple50 w-8 h-8 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                            stroke="currentColor" class="size-5 text-Purple500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>
                    </div>
                </div>
                <div class="text-base md:text-lg">Proyek Terealisasi</div>
            </div>
            <div class="mt-3 p-3 bg-Purple200 border border-Purple100 rounded-lg">
                <div class="text-lg md:text-xl font-bold">{{$data['release_proyek']}}</div>
            </div>
        </div>

        <!-- Mitra Bergabung -->
        <div class="bg-Blue700 text-white rounded-xl p-5 flex flex-col relative">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-4">
                    <div class="bg-Blue50 w-8 h-8 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                            stroke="currentColor" class="size-5 text-Blue700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                        </svg>
                    </div>
                </div>
                <div class="text-base md:text-lg">Mitra Bergabung</div>
            </div>
            <div class="mt-3 p-3 bg-Blue300 border border-Blue100 rounded-lg">
                <div class="text-lg md:text-xl font-bold">{{$data['data_mitra']}}</div>
            </div>
        </div>

        <!-- Dana Realisasi CSR Mitra -->
        <div class="bg-Green600 text-white rounded-xl p-5 flex flex-col relative">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-4">
                    <div class="bg-Green50 w-8 h-8 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                            stroke="currentColor" class="size-5 text-Green600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>
                    </div>
                </div>
                <div class="text-base md:text-lg">Dana Realisasi CSR Mitra</div>
            </div>
            <div class="mt-3 p-3 bg-Green300 border border-Green100 rounded-lg">
                <div class="text-lg md:text-xl font-bold">Rp.{{number_format($data['dana_mitra'], 0, ',', ',')}}</div>
            </div>
        </div>
    </div>
</div>

<!-- Chart Section -->
<div class="container mx-auto w-full mb-20 mt-12 px-6">
    <h1 class="my-6 text-xl md:text-2xl font-bold mb-4">Realisasi Proyek CSR</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white rounded-lg shadow-md p-6 md:p-6 lg:p-8">
        <!-- Pie Chart -->
        <div>
            <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Persentase total realisasi berdasarkan
                sektor CSR</h2>
            <div id="pieChart"></div>
        </div>
        <!-- Bar Charts -->
        <div>
            <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Total realisasi sektor CSR</h2>
            <div id="barChart1"></div>
        </div>
        <div>
            <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Persentase total realisasi berdasarkan PT
            </h2>
            <div id="barChart2"></div>
        </div>
        <div>
            <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Persentase total realisasi berdasarkan
                Kecamatan</h2>
            <div id="barChart3"></div>
        </div>
    </div>
</div>
{{-- End Chart Section --}}




<script>
        var dataRealisasi = @json($data_realisasi);
        var categories = Object.keys(dataRealisasi);
          var seriesData = Object.values(dataRealisasi);

          var dataPt = @json($data_pt);
        var categoriesPt = Object.keys(dataPt);
          var seriesPt = Object.values(dataPt);

          var dataKec = @json($data_kecamatan);
        var categoriesKec = Object.keys(dataKec);
          var seriesKec = Object.values(dataKec);
    // Pie Chart Configuration
    var pieOptions = {
        series: seriesData,
        chart: {
            type: 'pie',
            height: 350
        },
        labels: categories,
        colors: ['#28A0F6', '#4E5BA6', '#7A5AF8', '#EE46BC', '#B42121', '#F95016',
            '#FAC515'
        ], // Adjust the colors as needed
        dataLabels: {
            enabled: false,
        },
        tooltip: {
        y: {
            formatter: function (val) {
                return "Rp " + val.toLocaleString('id-ID');
            }
        }
    },
        responsive: [{
                breakpoint: 1279,
                options: {
                    chart: {
                        width: 300
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            },
            {
                breakpoint: 1023,
                options: {
                    chart: {
                        width: 300 // Adjust the width as needed
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            },
            {
                breakpoint: 768,
                options: {
                    chart: {
                        width: 500 // Adjust the width as needed
                    },
                    legend: {
                        position: 'right',
                    }
                }
            },
            {
                breakpoint: 565,
                options: {
                    chart: {
                        width: 470
                    },
                    legend: {
                        position: 'right'
                    }
                }
            },
            {
                breakpoint: 530,
                options: {
                    chart: {
                        width: 300
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            },
            {
                breakpoint: 375,
                options: {
                    chart: {
                        width: 250
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        ]
    };

    var pieChart = new ApexCharts(document.querySelector("#pieChart"), pieOptions);
    pieChart.render();

    // Bar Chart 1 Configuration
    var barOptions1 = {
        series: [{
            data: seriesData
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
                distributed: true,
                dataLabels: {
                    position: 'center' // Mengatur posisi data di dalam bar
                }
            }
        },
        colors: ['#4E5BA6', '#7A5AF8', '#EE46BC', '#B42121', '#F95016'], // Sesuaikan warna di sini
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return "Rp " + val.toLocaleString('id-ID'); // Mengubah format menjadi Rp
            },
            style: {
                colors: ['#fff'] // Warna teks data label
            }
        },
        xaxis: {
            categories: categories,
            labels: {
                show: false // Disable x-axis labels
            },
            axisBorder: {
                show: false // Optionally, hide the axis line
            },
            axisTicks: {
                show: false // Optionally, hide the axis ticks
            }
        },
        tooltip: {
        y: {
            formatter: function (val) {
                return "Rp " + val.toLocaleString('id-ID');
            }
        }
    },
        legend: {
            show: false
        }
    };

    var barChart1 = new ApexCharts(document.querySelector("#barChart1"), barOptions1);
    barChart1.render();


    // Bar Chart 2 Configuration
    var barOptions2 = {
        series: [{
            data: seriesPt
        }],
        chart: {
            type: 'bar',
            height: 450
        },
        plotOptions: {
            bar: {
                horizontal: true,
                distributed: true,
                dataLabels: {
                    position: 'center' // Mengatur posisi data di dalam bar
                }
            }
        },
        tooltip: {
        y: {
            formatter: function (val) {
                return "Rp " + val.toLocaleString('id-ID');
            }
        }
    },
        colors: ['#4E5BA6', '#7A5AF8', '#EE46BC', '#B42121', '#F95016', '#66C61C',
            '#16B364'
        ], // Sesuaikan warna di sini
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return "Rp " + val.toLocaleString('id-ID'); // Mengubah format menjadi Rp
            },
            style: {
                colors: ['#fff'] // Warna teks data label
            }
        },
        xaxis: {
            categories: categoriesPt,
            labels: {
                show: false // Disable x-axis labels
            },
            axisBorder: {
                show: false // Optionally, hide the axis line
            },
            axisTicks: {
                show: false // Optionally, hide the axis ticks
            }
        },
        legend: {
            show: false
        }
    };

    var barChart2 = new ApexCharts(document.querySelector("#barChart2"), barOptions2);
    barChart2.render();

    // Bar Chart 3 Configuration
    var barOptions3 = {
        series: [{
            data: seriesKec
        }],
        chart: {
            type: 'bar',
            height: 450
        },
        plotOptions: {
            bar: {
                horizontal: true,
                distributed: true,
                dataLabels: {
                    position: 'center' // Mengatur posisi data di dalam bar
                }
            }
        },
        tooltip: {
        y: {
            formatter: function (val) {
                return "Rp " + val.toLocaleString('id-ID');
            }
        }
    },
        colors: ['#4E5BA6', '#7A5AF8', '#EE46BC', '#B42121', '#F95016', '#66C61C',
            '#16B364'
        ], // Sesuaikan warna di sini
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return "Rp " + val.toLocaleString('id-ID'); // Mengubah format menjadi Rp
            },
            style: {
                colors: ['#fff'] // Warna teks data label
            }
        },
        xaxis: {
            categories: categoriesKec,
            labels: {
                show: false // Disable x-axis labels
            },
            axisBorder: {
                show: false // Optionally, hide the axis line
            },
            axisTicks: {
                show: false // Optionally, hide the axis ticks
            }
        },
        legend: {
            show: false
        }
    };

    var barChart3 = new ApexCharts(document.querySelector("#barChart3"), barOptions3);
    barChart3.render();

</script>
@endif
@endif

<script>
     document.getElementById('upload').addEventListener('click', function() {
        document.getElementById('file-input').click();
    });
    document.getElementById('file-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.getElementById('preview');
                const uploadPlaceholder = document.getElementById('img-placeholder');
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
                uploadPlaceholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>




</x-app-layout>
