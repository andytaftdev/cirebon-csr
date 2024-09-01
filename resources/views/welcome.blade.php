<x-guest-layout>
    <!-- Header Section -->

    @include('components.navbar-umum')

    <!-- Header Section -->
    <div class="w-full min-h-screen flex flex-col relative">
        <div class="w-full h-auto flex justify-center items-center relative">
            <div class="w-2/5 h-screen bg-AccentRed950"></div>
            <div class="w-3/5 h-screen bg-white"></div>
            <img src="{{ asset('images/background.png') }}" alt="Image Dashboard"
                class="absolute w-full h-screen p-10 xl:p-14 object-cover z-10"
                style="transform: translateX(-50%); left: 50%;">
            <div
                class="absolute w-9/12 xl:w-10/12 mx-auto inset-0 flex flex-col items-start justify-start mt-48 xl:mt-0 xl:justify-center text-start z-20 p-5 md:p-0">
                <h1 class="text-white text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold">Selamat Datang <br> Di
                    Portal CSR <br> Kab. Cirebon
                </h1>
                <p class="text-gray-200 text-base md:text-lg my-5 max-w-md">Ketahui dan kenali customer social
                    responsibility terhadap Kabupaten Cirebon dari para Mitra.</p>
                <div class="bg-gray-200 h-0.5 w-96 hidden md:flex"></div>
            </div>

            <!-- Carousel Section -->
            <div id="carousel"
                class="absolute z-30 bottom-0 right-0 xl:right-20 bg-Gray900 backdrop-blur-lg bg-opacity-85 px-6 py-5 lg:px-12 lg:py-11 max-w-lg xl:max-w-xl">
                <div class="relative overflow-hidden">
                    @php
                    $firstCarousel = $kegiatanCarousel->last();
                    @endphp
                    <div class="carousel-item block duration-700 ease-in-out transform translate-x-0 opacity-100">
                        <h2 class="text-white text-xl lg:text-2xl font-semibold mb-4">{{$firstCarousel->judul}}</h2>
                        <span class="text-white text-xs px-3 py-2 bg-AccentRed900 uppercase tracking-widest">{{$firstCarousel->day}} {{$firstCarousel->month}} {{$firstCarousel->year}}</span>
                        <div class="text-white text-base leading-relaxed mt-4" style="color: white !important;">
                       {!! $firstCarousel->deskripsi !!}
                       </div>
                    </div>
                    @foreach($kegiatanCarousel as $item)

                    <div class="carousel-item block duration-700 ease-in-out transform translate-x-0 hidden">
                        <h2 class="text-white text-xl lg:text-2xl font-semibold mb-4">{{$item->judul}}</h2>
                        <span class="text-white text-xs px-3 py-2 bg-AccentRed900 uppercase tracking-widest">{{$item->day}} {{$item->month}} {{$item->year}}</span>
                        <div class="text-white text-base leading-relaxed mt-4" style="color: white !important;">
                       {!! $item->deskripsi !!}
                       </div>
                    </div>
                    @endforeach

                </div>

                <div class="bg-white w-full h-[2px] my-5 rounded-full lg:block hidden"></div>
                <div class="mt-4 lg:block hidden">
                    <div class="flex space-x-2">
                        <div class="carousel-indicator w-14 h-2 bg-AccentRed900 rounded-full"></div>
                        <div class="carousel-indicator w-5 h-2 bg-ColorE7E7E7 rounded-full"></div>
                        <div class="carousel-indicator w-5 h-2 bg-ColorE7E7E7 rounded-full"></div>
                        <div class="carousel-indicator w-5 h-2 bg-ColorE7E7E7 rounded-full"></div>
                        <div class="carousel-indicator w-5 h-2 bg-ColorE7E7E7 rounded-full"></div>
                        <!-- Additional indicators go here... -->
                    </div>
                </div>
            </div>

        </div>


        <!-- Mitra CSR Section -->
        <section>
            <div class="w-full md:w-3/4 mx-auto relative py-12 px-7 md:px-0 bg-white flex flex-col justify-center">
                <h2 class="text-3xl md:text-4xl font-bold text-Color121C22 mb-8 max-w-md z-20">Mitra CSR Kabupaten
                    Cirebon
                </h2>
                <div class="grid grid-cols-2 lg:grid-cols-5 z-30">
                    <!-- Ganti "path_to_logo" dengan URL logo yang sesuai -->
                     @foreach($mitra as $item)
                    <div class=" flex items-center justify-center border-gray-200 p-9 border-b border-r">
                        <img src="{{ asset('storage/img/profile/'. $item->mitra_logo) }}" alt="logoipsum" class="h-10">
                    </div>
                    @endforeach



                </div>
            </div>
        </section>

        <!-- Data Statistik Section -->
        <section>
            <div class="w-full md:w-3/4 mx-auto py-12 px-7 md:px-0 bg-white flex flex-col justify-center">
                <div class="bg-red-500 h-1 w-12 self-center mb-4"></div>
                <h2 class="text-3xl md:text-4xl font-bold text-[#121C22] mb-8 self-center">Data Statistik</h2>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center mt-12">

                    <div class="text-left flex flex-row space-x-5 items-center justify-center">
                        <div class="bg-red-200 h-full w-0.5"></div>
                        <div class="flex flex-col">
                            <h3 class="text-4xl font-semibold text-[#4F0A02]">{{$data['jumlah_proyek']}}</h3>
                            <p class="text-gray-600">Total Proyek CSR</p>
                        </div>
                    </div>
                    <div class="text-left flex flex-row space-x-5 items-center justify-center">
                        <div class="bg-red-200 h-full w-0.5"></div>
                        <div class="flex flex-col">
                            <h3 class="text-4xl font-semibold text-[#4F0A02]">{{$data['release_proyek']}}</h3>
                            <p class="text-gray-600">Proyek terealisasi</p>
                        </div>
                    </div>
                    <div class="text-left flex flex-row space-x-5 items-center justify-center">
                        <div class="bg-red-200 h-full w-0.5"></div>
                        <div class="flex flex-col">
                            <h3 class="text-4xl font-semibold text-[#4F0A02]">{{$data['data_mitra']}}</h3>
                            <p class="text-gray-600">Mitra bergabung</p>
                        </div>
                    </div>
                    <div class="text-left flex flex-row space-x-5 items-center justify-center">
                        <div class="bg-red-200 h-full w-0.5"></div>
                        <div class="flex flex-col">
                            <h3 class="text-4xl font-semibold text-[#4F0A02]">Rp.{{$data['dana_mitra']}}</h3>
                            <p class="text-gray-600">Dana realisasi CSR</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Apa Itu Kegiatan CSR Section -->
        <section>
            <div class="w-full md:w-3/4 mx-auto relative py-12 px-7 md:px-0 flex xl:flex-row flex-col-reverse">
                <div class="w-full xl:w-1/2 flex flex-col space-y-4">
                    <div class="flex gap-3 justify-center">
                        <img src="{{ asset('images/kegiatan-csr-2.png') }}" alt="img-kegiatan-csr-2"
                            class="w-56 h-36 hidden sm:flex object-cover self-end">
                        <img src="{{ asset('images/kegiatan-csr-1.png') }}" alt="img-kegiatan-csr-1"
                            class="md:h-52 h-44 w-80 object-cover">
                    </div>
                    <img src="{{ asset('images/kegiatan-csr-3.png') }}" alt="img-kegiatan-csr-3"
                        class="md:h-52 h-44 w-80 self-center xl:self-start object-cover">
                </div>

                <div class="flex flex-col w-full xl:w-1/2 p-5">
                    <div class="bg-AccentRed400 h-1 w-12 mb-4 z-30"></div>
                    <h2 class="text-3xl md:text-4xl font-bold text-[#121C22] mb-8 z-20 max-w-64">Apa Itu Kegiatan CSR?
                    </h2>
                    <div class="flex flex-col xl:max-w-lg">
                        <div>
                            <p class="text-[#7A7A7A] mb-4">
                                Corporate Social Responsibility (CSR) merupakan konsep di mana perusahaan secara sadar
                                mengintegrasikan kepedulian sosial dan lingkungan ke dalam operasional bisnisnya. Ini
                                melibatkan
                                tindakan sukarela yang memberikan manfaat bagi masyarakat, seperti program pendidikan,
                                kesehatan,
                                dan lingkungan, serta upaya untuk mengurangi dampak negatif terhadap lingkungan. CSR
                                tidak
                                hanya
                                mencerminkan tanggung jawab perusahaan terhadap masyarakat, tetapi juga dapat
                                meningkatkan
                                reputasi
                                dan daya saing bisnis.
                            </p>
                            <p class="text-[#7A7A7A] mb-4">
                                Berdasarkan Undang-Undang nomor 40  Tahun 2007 tentang Perseroan Terbatas (UUPT) pasal 1
                                ayat 3,
                                pengertian Tanggung Jawab Sosial dan Lingkungan Perusahaan (TJSLP) atau Corporate Social
                                Responsibility (CSR) adalah komitmen perseroan untuk berperan serta dalam pembangunan
                                ekonomi
                                berkelanjutan guna meningkatkan kualitas kehidupan dan lingkungan yang bermanfaat, baik
                                bagi
                                perseroan sendiri, komunitas setempat, maupun masyarakat pada umumnya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sektor CSR Section -->
        <section class="bg-Gray900">
            <div class="w-full md:w-3/4 mx-auto relative py-24 px-7 md:px-0 text-white flex flex-col">
                <div class="bg-AccentRed400 h-1 w-12 mb-4"></div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Sektor CSR</h2>
                <h2 class="text-xl font-normal mb-12">Bidang sektor CSR Kabupaten Cirebon yang tersedia</h2>

                <div class="w-full flex flex-col lg:flex-row lg:space-x-14">
                    <div class="lg:w-1/2 w-full flex flex-col">
                        <div>
                            @foreach($sektor as $index => $item)
                            @php
                            $sektor_name = $item->nama_sektor;
                            $sektors = str_replace(' ', '_', $sektor_name); // Mengganti spasi dengan underscore
                            @endphp
                            <button id="btn-{{$sektors}}"
                                onclick="toggleActive('btn-{{$sektors}}'); changeContent('{{$sektors}}')"
                                class="btn w-full text-left py-4 px-6 font-semibold text-xl border-l-4 flex justify-between
                                {{ $loop->first ? 'bg-[#282F3E] border-AccentRed400 font-semibold' : 'border-Neutral700' }}">
                                {{$item->nama_sektor}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="relative lg:w-1/2 w-full flex flex-col items-center justify-center mt-8">
                        <div id="content-img" style="" alt="sektor-csr-img"
                            class=" lg:absolute h-72 lg:top-0 lg:left-7 lg:block hidden w-96 bg-center bg-cover"></div>
                        <div id="content-bg" class="bg-[#510300] lg:block hidden h-60 w-60 mb-14 self-start"></div>
                        <p id="content-description" class="text-gray-300 mb-4"></p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a id="nav-sektor" href="">
                                <button
                                    class="w-full py-3 px-4 bg-AccentRed900 hover:bg-red-700 rounded-lg text-white mt-4">
                                    Lihat program tersedia
                                </button>
                            </a>

                            <button
                                class="w-full py-3 px-4 border border-white rounded-lg text-white hover:border-gray-400 hover:text-gray-400 mt-4">
                                Lihat realisasi program
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Section: Sambutan Bupati -->
        <section>
            <div
                class="relative w-full md:w-3/4 mx-auto py-16 px-7 md:px-0 bg-white flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 lg:pr-16 z-10">
                    <div class="w-[40px] h-[4px] bg-AccentRed400 mb-5"></div>
                    <h2 class="text-4xl font-bold mb-4 text-Color121C22">Sambutan Bupati Kabupaten Cirebon</h2>
                    <p class="text-Color7A7A7A mb-6">
                        Elit sit vitae nulla porttitor nulla platea lectus ultrices cursus. Proin mi nisi mi sed
                        amet.
                        Aliquam sit sed turpis ut sociis consequat nibh enim malesuada. Eget vestibulum volutpat
                        cursus
                        enim. Urna maecenas at sed dignissim augue aliquam. In diam condimentum ultricies sit proin
                        egestas. Nunc eget quisque vestibulum vestibulum quisque ipsum gravida malesuada. Tempor
                        quis
                        arcu sociis non ut praesent mi id sit. Platea cursus diam sit vitae enim aliquet aliquam
                        arcu.
                        <br><br>
                        Posuere malesuada vehicula nunc adipiscing senectus. Leo sodales placerat enim at porttitor
                        lacinia. Sagittis viverra eu nunc velit. Euismod aliquet ullamcorper felis et ante egestas.
                        Venenatis faucibus ultrices morbi id tempus morbi. Lacus at quis tempus at nunc sed aliquam.
                        Scelerisque id fames pellentesque euismod. Mollis egestas mi tristique ipsum.
                    </p>
                    <p class="text-Color121C22 font-semibold text-xl">Drs. H. Imron Rosyadi, Lc., M.Ag., M.M.</p>
                    <p class="text-Color7A7A7A">Bupati Kabupaten Cirebon</p>
                </div>
                <div class="lg:w-1/2 h-auto mt-8 lg:mt-14 flex justify-end items-end">
                    <img src="{{ asset('images/bupati.png') }}" alt="Bupati" class="md:h-[350px] h-[250px] z-30">
                    <div class="absolute bg-Gray100 h-[430px] w-[560px] hidden xl:block"></div>
                </div>
            </div>
        </section>

        <!-- Section: Kegiatan Terbaru -->
        <section>
            <div class="relative w-full md:w-3/4 mx-auto py-16 px-7 md:px-0">
                <div class="flex flex-col justify-center items-center">
                    <div class="w-[44px] h-[4px] bg-Orange600"></div>
                    <h1 class="text-Ebony900 text-3xl lg:text-4xl font-bold mt-4">Kegiatan Terbaru</h1>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mt-12">
                    <!-- Card 1 -->
                    @foreach($kegiatan as $item)
                    <a href="{{route('kegiatan.detailKegiatan', $item->id)}}">
                        <div class="flex flex-col h-full">
                            <div
                                class="bg-white border border-Neutral300 overflow-hidden flex flex-col h-full relative">
                                <img class="w-full h-64 object-cover"
                                    src="{{ asset('storage/img/kegiatan/'. $item->gambar_kegiatan) }}" alt="Image 2">
                                <!-- Date overlay -->
                                <span
                                    class="text-xs text-white bg-AccentRed900 px-4 py-2 rounded absolute top-5 left-5 z-20">{{$item->day}}
                                    {{$item->month}} {{$item->year}}</span>
                                <div class="p-6 flex flex-col flex-1">
                                    <h2 class="mt-1 text-xl font-bold text-Ebony900">{{$item->judul}}</h2>
                                    <p class="mt-2 text-Ebony100">{!! $item->deskripsi !!}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <a href="{{route('kegiatan.kegiatanPublik')}}"><button
                        class="bg-white hover:bg-neutral-100 border border-Neutral300 font-semibold rounded-lg text-Ebony200 px-4 py-2 flex justify-center items-center mt-14 mx-auto">Lihat
                        semua kegiatan</button></a>
            </div>
        </section>

        <!-- Section: Laporan Program Terbaru -->
        <section>
            <div class="relative w-full md:w-3/4 mx-auto py-16 px-7 md:px-0">
                <div class="flex flex-col justify-center items-center">
                    <div class="w-[44px] h-[4px] bg-Orange600"></div>
                    <h1 class="text-Ebony900 text-3xl lg:text-4xl font-bold mt-4">Laporan Program Terbaru</h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-7 p-6">
                    <!-- Card 1 -->
                    @foreach($laporan as $item)
                    @php
                    $gambarLaporan = json_decode($item['gambar_laporan'], true);
                    @endphp
                    <a href="{{route('laporan.detailLaporan', $item->id)}}">
                        <div class="bg-white border border-Neutral300 overflow-hidden relative">
                            <img class="w-full h-72 object-cover"
                                src="{{ asset('storage/img/laporan/'. $gambarLaporan[0]) }}" alt="Image 1">
                            <!-- Date overlay -->
                            <span
                                class="text-xs text-white bg-AccentRed900 px-4 py-2 rounded absolute top-5 left-5 z-20">27
                                MAR,
                                2023</span>
                            <div class="p-6">
                                <h2 class="mt-2 text-xl font-bold text-Ebony900">Judul Kegiatan Terbaru.</h2>
                                <p class="mt-2 text-Ebony100">Praesent viverra sapien congue aliquet viverra
                                    maecenas
                                    sed bibendum.
                                    Elementum risus acc...</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <a href="{{route('laporan.laporanPublik')}}"><button
                        class="bg-white hover:bg-neutral-100 border border-Neutral300 font-semibold rounded-lg text-Ebony200 px-4 py-2 flex justify-center items-center my-7 mx-auto">Lihat
                        semua laporan program</button></a>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="bg-Gray900 text-white">
            <div class="relative md:w-3/4 w-full mx-auto px-7 md:px-0 py-24">
                <div class="container mx-auto flex flex-col">
                    <div class="bg-red-500 h-1 w-12 mb-4 z-20"></div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 z-10">Frequently Asked Question (FAQ)</h2>
                    <h2 class="text-xl font-normal mb-12">Pertanyaan yang sering muncul</h2>

                    <div class="w-full flex flex-col lg:flex-row lg:space-x-14">
                        <div class="lg:w-1/2 w-full flex flex-col">
                            <div>
                                <button id="btn-faq1" onclick="toggleActive2('btn-faq1'); changeContent2('apa')"
                                    class="btn-faq w-full text-left py-4 px-6 font-semibold bg-[#282F3E] hover:bg-[#282F3E] hover:font-semibold text-xl border-l-4 border-AccentRed400 flex justify-between">
                                    Apa itu CSR?
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                                <button id="btn-faq2" onclick="toggleActive2('btn-faq2'); changeContent2('mengapa')"
                                    class="btn-faq w-full text-left py-4 px-6 hover:font-semibold hover:bg-[#282F3E] text-xl border-l-4 border-Neutral700 flex justify-between">
                                    Mengapa CSR penting di Kabupaten Cirebon?
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                                <button id="btn-faq3" onclick="toggleActive2('btn-faq3'); changeContent2('bagaimana')"
                                    class="btn-faq w-full text-left py-4 px-6 hover:font-semibold hover:bg-[#282F3E] text-xl border-l-4 border-Neutral700 flex justify-between">
                                    Bagaimana cara perusahaan di Kabupaten Cirebon menjalankan program CSR?
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                                <button id="btn-faq4" onclick="toggleActive2('btn-faq4'); changeContent2('apa2')"
                                    class="btn-faq w-full text-left py-4 px-6 hover:font-semibold hover:bg-[#282F3E] text-xl border-l-4 border-Neutral700 flex justify-between">
                                    Apa saja contoh program CSR di Kabupaten Cirebon?
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                                <button id="btn-faq5" onclick="toggleActive2('btn-faq5'); changeContent2('bagaimana2')"
                                    class="btn-faq w-full text-left py-4 px-6 hover:font-semibold hover:bg-[#282F3E] text-xl border-l-4 border-Neutral700 flex justify-between">
                                    Bagaimana pemerintah Kabupaten Cirebon mendukung program CSR?
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="relative w-full lg:w-1/2 flex flex-col mt-8">
                            <p id="content-faq" class="text-gray-300 mb-4 text-base">CSR atau Corporate Social
                                Responsibility adalah komitmen perusahaan untuk berkontribusi dalam pembangunan
                                berkelanjutan dengan cara memberikan dampak positif bagi masyarakat dan lingkungan
                                sekitar.
                                Di Kabupaten Cirebon, CSR dapat diwujudkan melalui berbagai program seperti pendidikan,
                                kesehatan, lingkungan, dan pemberdayaan masyarakat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Contact US Section --}}
        <div
            class="w-full px-7 md:w-3/4 rounded-lg py-10 mx-auto flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-10">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const indicators = document.querySelectorAll('.carousel-indicator');
            const carouselItems = document.querySelectorAll('.carousel-item');
            let currentIndex = 0;
            let isAnimating = false;

            function updateIndicators() {
                indicators.forEach((indicator, index) => {
                    if (index === currentIndex) {
                        indicator.classList.add('bg-AccentRed900', 'w-14');
                        indicator.classList.remove('bg-ColorE7E7E7', 'w-5');
                    } else {
                        indicator.classList.add('bg-ColorE7E7E7', 'w-5');
                        indicator.classList.remove('bg-AccentRed900', 'w-14');
                    }
                });
            }

            function showSlide(index) {
                if (index === currentIndex || isAnimating) return;
                isAnimating = true;

                const currentSlide = carouselItems[currentIndex];
                const nextSlide = carouselItems[index];

                // Prepare next slide
                nextSlide.classList.remove('hidden', 'opacity-0');
                nextSlide.classList.add('absolute', 'top-0', 'w-full', 'h-full', 'opacity-0');

                // Tentukan posisi slide berikutnya berdasarkan arah
                if (index > currentIndex) {
                    nextSlide.style.left = '100%';
                } else {
                    nextSlide.style.left = '-100%';
                }
                nextSlide.style.zIndex = 10;

                // Start slide-in and fade-in animation for next slide
                setTimeout(() => {
                    nextSlide.classList.add('opacity-100');
                    nextSlide.classList.remove('opacity-0');
                    nextSlide.style.left = '0';
                }, 20); // Small delay to ensure transition is triggered

                // Start slide-out and fade-out animation for current slide
                currentSlide.style.left = index > currentIndex ? '-100%' : '100%';
                currentSlide.classList.add('opacity-0');
                currentSlide.classList.remove('opacity-100');

                // After animation ends, hide current slide and update the carousel state
                setTimeout(() => {
                    currentSlide.classList.add('hidden');
                    currentSlide.classList.remove('absolute', 'top-0', 'w-full', 'h-full', 'opacity-0');
                    currentSlide.style.zIndex = '';
                    currentSlide.style.left = '';

                    nextSlide.classList.remove('absolute');
                    nextSlide.style.zIndex = '';
                    nextSlide.style.left = '';

                    currentIndex = index;
                    updateIndicators();
                    isAnimating = false;
                }, 700); // Adjust according to transition duration

            }

            // Initialize the carousel
            showSlide(currentIndex);

            // Auto-scroll carousel every 4 seconds
            const autoScroll = setInterval(function () {
                let nextIndex = (currentIndex + 1) % carouselItems.length;
                showSlide(nextIndex);
            }, 4000);

            // Handle manual indicator clicks
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    clearInterval(autoScroll); // Stop auto-scroll when manually navigating
                    showSlide(index);
                });
            });
        });



        // Untuk Button Sektor CSR
        function toggleActive(selectedId) {
            // Hapus kelas aktif dari semua tombol
            document.querySelectorAll('.btn').forEach(function (button) {
                button.classList.remove('bg-[#282F3E]', 'border-AccentRed400', 'font-semibold');
                button.classList.add('border-Neutral700', 'bg-none');
            });

            // Tambahkan kelas aktif ke tombol yang dipilih
            const selectedButton = document.getElementById(selectedId);
            selectedButton.classList.add('bg-[#282F3E]', 'border-AccentRed400', 'font-semibold');
            selectedButton.classList.remove('border-Neutral700', 'bg-none');
        }

        // Mengaktifkan sektor pertama secara default
        document.addEventListener("DOMContentLoaded", function () {
            const firstSector = Object.keys(content)[0];
            toggleActive('btn-' + firstSector);
            changeContent(firstSector);
        });


        // Untuk Button Section FAQ
        function toggleActive2(selectedId) {
            // Hapus kelas aktif dari semua tombol
            document.querySelectorAll('.btn-faq').forEach(function (button) {
                button.classList.remove('bg-[#282F3E]', 'border-AccentRed400', 'font-semibold');
                button.classList.add('border-Neutral700', 'bg-none');
            });

            // Tambahkan kelas aktif ke tombol yang dipilih
            const selectedButton2 = document.getElementById(selectedId);
            selectedButton2.classList.add('bg-[#282F3E]', 'border-AccentRed400', 'font-semibold');
            selectedButton2.classList.remove('border-Neutral700', 'bg-none');
        }


    // Untuk Berubah Konten Pada Sektor CSR Section
        const content = {
            @foreach($sektor as $item)
                @php
                    $sektor_name = $item->nama_sektor;
                    $sektors = str_replace(' ', '_', $sektor_name); // Mengganti spasi dengan underscore
                @endphp
            "{{ $sektors }}": {
                imgSrc: "background-image: url('{{ asset('storage/img/sektor/'. $item->gambar_sektor) }}');",
                href: "{{ route('sektor.detailSektor', $item->id) }}",
                description: "{{ $item->deskripsi_sektor }}"
        },
        @endforeach
        };


        function changeContent(sektor) {
            document.getElementById('content-img').style = content[sektor].imgSrc;
            document.getElementById('nav-sektor').href = content[sektor].href;
            document.getElementById('content-description').textContent = content[sektor].description;
        }


        // Untuk Berubah Konten Pada FAQ (Frequently Asked Questions)
        // Untuk Berubah Konten Pada Sektor CSR Section
        const content2 = {
            apa: {
                description: "CSR atau Corporate Social Responsibility adalah komitmen perusahaan untuk berkontribusi dalam pembangunan berkelanjutan dengan cara memberikan dampak positif bagi masyarakat dan lingkungan sekitar. Di Kabupaten Cirebon, CSR dapat diwujudkan melalui berbagai program seperti pendidikan, kesehatan, lingkungan, dan pemberdayaan masyarakat."
            },
            mengapa: {
                description: "CSR penting di Kabupaten Cirebon karena berperan dalam meningkatkan kualitas hidup masyarakat dan mendukung pembangunan berkelanjutan. Melalui CSR, perusahaan dapat berkontribusi dalam mengatasi berbagai masalah sosial, seperti kemiskinan, pendidikan, dan kesehatan. CSR juga membantu menjaga kelestarian lingkungan, yang merupakan aset berharga bagi keberlanjutan ekonomi lokal. Dengan menjalankan program CSR, perusahaan dapat membangun hubungan baik dengan masyarakat, meningkatkan reputasi, serta menciptakan dampak positif yang lebih luas bagi seluruh daerah."
            },
            bagaimana: {
                description: "Perusahaan di Kabupaten Cirebon menjalankan program CSR dengan mengidentifikasi kebutuhan masyarakat setempat dan merancang inisiatif yang relevan. Mereka bekerja sama dengan pemerintah, LSM, dan komunitas untuk memastikan program yang dijalankan tepat sasaran dan berkelanjutan. Program CSR dapat berupa pendidikan, kesehatan, pengelolaan lingkungan, hingga pembangunan infrastruktur. Selain itu, perusahaan sering kali melibatkan masyarakat dalam pelaksanaan program, memastikan partisipasi aktif dan manfaat langsung yang dirasakan oleh masyarakat."
            },
            apa2: {
                description: "Beberapa contoh program CSR di Kabupaten Cirebon meliputi pembangunan sekolah dan fasilitas kesehatan, pelatihan keterampilan bagi pemuda, dan penghijauan lingkungan. Perusahaan juga mendukung program sanitasi dengan membangun toilet umum dan pengelolaan limbah. Selain itu, ada juga program pemberdayaan ekonomi, seperti bantuan modal usaha bagi UMKM, serta dukungan terhadap kegiatan budaya dan keagamaan. Program-program ini bertujuan untuk meningkatkan kesejahteraan masyarakat serta mendukung pertumbuhan ekonomi lokal yang inklusif dan berkelanjutan."
            },
            bagaimana2: {
                description: "Pemerintah Kabupaten Cirebon mendukung program CSR dengan menyediakan regulasi yang memfasilitasi partisipasi perusahaan dalam pembangunan daerah. Mereka juga menjalin kemitraan dengan perusahaan untuk menyelaraskan program CSR dengan rencana pembangunan daerah. Selain itu, pemerintah memberikan insentif bagi perusahaan yang berkomitmen dalam CSR, seperti pengakuan melalui penghargaan. Pemerintah juga memfasilitasi komunikasi antara perusahaan dan masyarakat untuk memastikan program CSR berjalan efektif dan memberikan manfaat nyata bagi semua pihak yang terlibat."
            },
        };

        function changeContent2(faq) {
            document.getElementById('content-faq').textContent = content2[faq].description;
        }

    </script>

    <x-footer-umum></x-footer-umum>

</x-guest-layout>