
<x-guest-layout>
@include('components.navbar-umum')

<div class="w-full min-h-screen flex flex-col relative">
    <div class="w-full h-auto flex justify-center items-center relative">
        <div class="w-2/5 h-[300px] md:h-[400px] bg-AccentRed950"></div>
        <div class="w-3/5 h-[300px] md:h-[400px] bg-white"></div>
        <img src="{{ asset('images/background.png') }}" alt="Image Dashboard"
            class="absolute px-10 w-full h-[220px] md:h-[300px] object-cover z-10"
            style="transform: translateX(-50%); left: 50%;">
        <div class="absolute w-3/4 mx-auto inset-0 flex flex-col items-start justify-center text-start z-20 p-5 md:p-0">
            <p class="text-white text-sm md:text-base"><span class="text-OrangeS">Beranda /</span> Statistik</p>
            <h1 class="text-white text-5xl md:text-7xl font-bold mt-3">Statistik</h1>
            <p class="text-gray-300 text-sm md:text-base mt-2">Program CSR yang sudah berjalan di kabupaten cirebon</p>
        </div>
    </div>

    <div class="container mx-auto w-full md:w-3/4 px-7">
        <div class="my-12 md:my-20 flex flex-col justify-center">
            {{-- Data Statistik Section --}}
            <div class="bg-red-600 h-1 w-12 self-center mb-4"></div>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-Ebony900 mb-8 self-center">Data Statistik</h2>
            <div class="flex flex-wrap justify-between items-center mb-2">
                <div class="flex flex-wrap lg:flex-nowrap lg:flex-row w-full lg:gap-3">
                <form id="filter" method="GET" action="{{ route('filter.stat.publik') }}" class="flex flex-wrap lg:flex-nowrap lg:flex-row w-full lg:gap-3">
            @csrf

            <div class="relative w-full py-2 sm:pr-2 lg:pr-0 sm:w-1/2 md:w-1/2">
                        <select name="year" id="year"
                            class="appearance-none border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white w-full pr-10">
                            @for ($i = 2000; $i <= date('Y'); $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative w-full py-2 sm:pl-2 lg:pl-0 sm:w-1/2 md:w-1/2">
                        <select name="kuartal" id="kuartal"
                            class="appearance-none border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white w-full pr-10">
                            <option value="1" >Kuartal 1 (Jan, Feb, Maret)</option>
                        <option value="2" >Kuartal 2 (April, Mei, Juni)</option>
                        <option value="3" >Kuartal 3 (Juli, Aug, Sep)</option>
                        <option value="4">Kuartal 4 (Oct, Nov, Des)</option>
                        </select>
                        <!-- Icon kalender -->
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                        </div>
                    </div>

                <!-- Dropdown 3 -->
                <div class="w-full py-2 sm:pr-2 lg:pr-0 sm:w-1/2 md:w-1/2 hidden lg:">
                    <select name="sektor" id="sektor" class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white w-full">
                        <option value="semua">Semua Sektor</option>

                    </select>
                </div>
                <!-- Dropdown 4 -->
                <div  class="w-full py-2 sm:pl-2 lg:pl-0 sm:w-1/2 md:w-1/2 hidden lg:">
                    <select name="mitra" id="mitra" class="border border-Neutral300 text-Ebony900 rounded-lg p-2 bg-white w-full">
                    <option value="semua">Semua Mitra</option>

                    </select>
                </div>
                </form>
                    <!-- Input 1 -->

                    <!-- Input 2 -->

                    <!-- Button Unduh .csv -->
                    <div class="flex justify-center gap-3 w-full lg:w-auto">
                        <div class="w-full mt-2">
                            <button id="filterBtn"
                                class="bg-white hover:bg-gray-100 text-Ebony300 border border-Neutral300 px-4 py-2 rounded-lg flex items-center gap-2 w-full justify-center text-nowrap">

                                <p>Unduh .csv</p>
                            </button>
                        </div>
                        <!-- Button Unduh .pdf -->
                        <div class="w-full mt-2">
                            <button
                                id="captureBtn" class="bg-white hover:bg-gray-100 text-Ebony300 border border-Neutral300 px-4 py-2 rounded-lg flex items-center gap-2 w-full justify-center text-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                <p>Unduh .pdf</p>
                            </button>
                        </div>
                        <form id="pdfForm" action="{{ route('publikStat.pdf') }}" method="POST">
                             @csrf
                           <input type="hidden" id="chartImage" name="chartImage">
                          </form>
                    </div>
                </div>
            </div>
            <div id="pieContainer">
            {{-- Card Section --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center mt-12">
                <div class="text-left flex flex-row space-x-5 items-center">
                    <div class="bg-red-200 h-full w-0.5"></div>
                    <div class="flex flex-col space-y-2">
                        <h3 class="text-3xl md:text-4xl xl:text-5xl font-semibold text-AccentRed950">{{$data['jumlah_proyek']}}</h3>
                        <p class="text-gray-600 text-base lg:text-lg">Total Proyek CSR</p>
                    </div>
                </div>
                <div class="text-left flex flex-row space-x-5 items-center">
                    <div class="bg-red-200 h-full w-0.5"></div>
                    <div class="flex flex-col space-y-2">
                        <h3 class="text-3xl md:text-4xl xl:text-5xl font-semibold text-AccentRed950">{{$data['release_proyek']}}</h3>
                        <p class="text-gray-600 text-base lg:text-lg">Proyek terealisasi</p>
                    </div>
                </div>
                <div class="text-left flex flex-row space-x-5 items-center">
                    <div class="bg-red-200 h-full w-0.5"></div>
                    <div class="flex flex-col space-y-2">
                        <h3 class="text-3xl md:text-4xl xl:text-5xl font-semibold text-AccentRed950">{{$data['data_mitra']}}</h3>
                        <p class="text-gray-600 text-base lg:text-lg">Mitra bergabung</p>
                    </div>
                </div>
                <div class="text-left flex flex-row space-x-5 items-center">
                    <div class="bg-red-200 h-full w-0.5"></div>
                    <div class="flex flex-col space-y-2">
                        <h3 class="text-3xl md:text-4xl xl:text-5xl font-semibold text-AccentRed950">Rp.{{$data['dana_mitra']}}</h3>
                        <p class="text-gray-600 text-base lg:text-lg">Dana realisasi CSR</p>
                    </div>
                </div>
            </div>
            {{-- Chart Section --}}
            <div class="container mx-auto w-full mt-16 md:mt-28">
                <div class="w-[40px] h-[4px] bg-Orange600"></div>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-Ebony900 mt-4 mb-4 md:mb-10">Realisasi <br>
                    Proyek CSR</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 rounded-lg p-6 lg:p-8">
                    <!-- Pie Chart -->
                    <div>
                        <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Persentase total realisasi
                            berdasarkan
                            sektor CSR</h2>
                        <div id="pieChart"></div>
                    </div>
                    <!-- Bar Charts -->
                    <div>
                        <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Total realisasi sektor CSR</h2>
                        <div id="barChart1"></div>
                    </div>
                    <div>
                        <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Persentase total realisasi
                            berdasarkan PT
                        </h2>
                        <div id="barChart2"></div>
                    </div>
                    <div>
                        <h2 class="text-lg md:text-xl font-semibold mb-4 text-Ebony900">Persentase total realisasi
                            berdasarkan
                            Kecamatan</h2>
                        <div id="barChart3"></div>
                    </div>
                </div>
            </div>
            </div>

        </div>
        {{-- Contact US Section --}}
        <div class="w-full rounded-lg py-10 mx-auto flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-10">
            <div class="flex flex-col w-full md:w-1/2">
                <div class="w-[40px] h-[4px] bg-Orange600"></div>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-Ebony900 mt-5">Hubungi Kami</h2>
                <p class="text-Ebony100 text-lg mt-2 mb-10 max-w-[80%]">
                    Hubungi kami melalui formulir di samping, atau melalui kontak di bawah.
                </p>
                <div class="space-y-6">
                    {{-- Alamat --}}
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-AccentRed100 rounded-full flex items-center justify-center mr-4">
                            <div class="bg-Red100 w-10 h-10 rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-6 text-AccentRed900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="font-semibold text-Ebony900 text-lg">Alamat</p>
                            <p class="font-semibold text-AccentRed900 max-w-80">
                                Jl. Sunan Kalijaga No.7, Sumber, Kec. Sumber, Kabupaten Cirebon, Jawa Barat 45611
                            </p>
                        </div>
                    </div>
                    {{-- Phone --}}
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-AccentRed100 rounded-full flex items-center justify-center mr-4">
                            <div class="bg-Red100 w-10 h-10 rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-5 text-AccentRed900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="font-semibold text-Ebony900 text-lg">Phone</p>
                            <p class="font-semibold text-AccentRed900 max-w-80">
                                (0231) 321197 <span class="font-normal text-Ebony100">atau</span> (0231) 3211792
                            </p>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-AccentRed100 rounded-full flex items-center justify-center mr-4">
                            <div class="bg-Red100 w-10 h-10 rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-6 text-AccentRed900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="font-semibold text-Ebony900 text-lg">Email</p>
                            <p class="font-semibold text-AccentRed900 max-w-80">
                                pemkab@cirebonkab.go.id
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Maps (iframe) --}}
            <div class="w-full flex justify-end items-center md:w-1/2 overflow-hidden">
                <iframe class="rounded-xl"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126727.45521340737!2d108.53109120810333!3d-6.741796154826186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1edbeac82d55%3A0x3039d80b2201da0!2sKabupaten%20Cirebon%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1629440009474!5m2!1sid!2sid"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    <x-footer-umum></x-footer-umum>
</div>

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

<script>
        document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('captureBtn').addEventListener('click', function() {
        console.log(html2canvas)
    html2canvas(document.querySelector("#pieContainer")).then(canvas => {
        var imgData = canvas.toDataURL("image/png");
        document.getElementById('chartImage').value = imgData;
        document.getElementById('pdfForm').submit();
    });
});
document.getElementById('filterBtn').addEventListener('click', function() {
        document.getElementById('filter').submit();
});

        document.getElementById('kuartal').addEventListener('change', function() {
            document.getElementById('filter').submit();
        });
    });

</script>



</x-guest-layout>