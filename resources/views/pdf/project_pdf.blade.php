<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
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
</body>
</html>