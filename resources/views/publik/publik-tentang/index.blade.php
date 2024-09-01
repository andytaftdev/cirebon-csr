<x-guest-layout>
    @include('components.navbar-umum')


    <div class="w-full min-h-screen flex flex-col relative bg-white">
        {{-- Tentang Header --}}
        <div class="w-full h-auto flex justify-center items-center relative">
            <div class="w-2/5 h-[300px] md:h-[400px] bg-AccentRed950"></div>
            <div class="w-3/5 h-[300px] md:h-[400px] bg-white"></div>

            <!-- Image berada di tengah-tengah div merah dan abu-abu -->
            <img src="{{ asset('images/background.png') }}" alt="Image Dashboard"
                class="absolute px-10 w-full h-[220px] md:h-[300px] object-cover z-10"
                style="transform: translateX(-50%); left: 50%;">

            <!-- Teks berada di atas gambar -->
            <div
                class="absolute w-3/4 mx-auto inset-0 flex flex-col items-start justify-center text-start z-20 p-5 md:p-0">
                <p class="text-white text-sm md:text-base"><span class="text-OrangeS">Beranda</span> / Tentang</p>
                <h1 class="text-white text-5xl md:text-7xl font-bold mt-3">Tentang</h1>
                <p class="text-gray-300 text-sm md:text-base mt-2">Tentang CSR Kabupaten Cirebon</p>
            </div>
        </div>

        {{-- Apa Itu Kegiatan CSR Section --}}
        <div class="w-full md:w-3/4 mx-auto py-16 px-7 md:px-0 z-30">
            <div class="w-[40px] h-[4px] bg-AccentRed400 mb-4"></div>
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col lg:flex-row">
                    <h2 class="md:text-4xl text-3xl font-bold text-Color121C22 lg:pr-36 pb-6 lg:pb-14 lg:min-w-fit">Apa
                        Itu <br> Kegiatan CSR?</h2>
                    <p class="text-base text-Color7A7A7A ">Corporate Social Responsibility (CSR) merupakan konsep di
                        mana perusahaan secara sadar mengintegrasikan kepedulian sosial dan lingkungan ke dalam
                        operasional bisnisnya. Ini melibatkan tindakan sukarela yang memberikan manfaat bagi masyarakat,
                        seperti program pendidikan, kesehatan, dan lingkungan, serta upaya untuk mengurangi dampak
                        negatif terhadap lingkungan. CSR tidak hanya mencerminkan tanggung jawab perusahaan terhadap
                        masyarakat, tetapi juga dapat meningkatkan reputasi dan daya saing bisnis.</p>
                </div>
                <p class="text-base text-Color7A7A7A ">Berdasarkan Undang-Undang nomor 40  Tahun 2007 tentang Perseroan
                    Terbatas (UUPT) pasal 1 ayat 3, pengertian Tanggung Jawab Sosial dan Lingkungan Perusahaan
                    (TJSLP) atau Corporate Social Responsibility (CSR) adalah komitmen perseroan untuk berperan serta
                    dalam pembangunan ekonomi berkelanjutan guna meningkatkan kualitas kehidupan dan lingkungan yang
                    bermanfaat, baik bagi perseroan sendiri, komunitas setempat, maupun masyarakat pada umumnya.</p>
            </div>
        </div>

        {{-- Tujuan Section --}}
        <div class="relative w-full md:w-3/4 mx-auto py-12 px-7 md:px-0 bg-white flex xl:flex-row flex-col-reverse">
            <div class="w-full xl:w-1/2 flex flex-col space-y-4">
                <div class="flex gap-3 justify-center">
                    <img src="{{ asset('images/tujuan2.png') }}" alt="tujuan2"
                        class="w-56 h-36 hidden sm:flex object-cover self-end">
                    <img src="{{ asset('images/tujuan1.png') }}" alt="tujuan1" class="md:h-52 h-44 w-80 object-cover">
                </div>
                <img src="{{ asset('images/tujuan3.png') }}" alt="tujuan3"
                    class="md:h-52 h-44 w-80 self-center xl:self-start object-cover">
            </div>
            <div class="flex flex-col w-full xl:w-[46%] p-5">
                <div class="bg-AccentRed400 h-1 w-12 mb-4 z-20"></div>
                <h2 class="text-3xl md:text-4xl font-bold text-[#121C22] mb-8 z-20 max-w-64">Tujuan</h2>
                <div class="flex flex-col xl:max-w-lg">
                    <div>
                        <p class="text-[#7A7A7A] mb-4">
                            Maksud pemerintah kabupaten dalam Corporate Social Responsibility (CSR) adalah untuk
                            menciptakan sinergi yang kuat antara pemerintah, perusahaan, dan masyarakat. Tujuan utama
                            dari upaya ini adalah untuk mendorong pembangunan berkelanjutan di wilayah kabupaten. Dengan
                            melibatkan perusahaan dalam program CSR, diharapkan dapat tercipta solusi komprehensif bagi
                            berbagai permasalahan sosial dan lingkungan, sehingga kesejahteraan masyarakat dapat
                            meningkat secara signifikan.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Manfaat Section --}}
        <div class="w-full md:w-3/4 mx-auto py-16 px-7 md:px-0 bg-white flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 lg:pr-16 z-10">
                <div class="w-[40px] h-[4px] bg-AccentRed400 mb-5"></div>
                <h2 class="text-4xl font-bold mb-4 text-Color121C22">Manfaat</h2>
                <p class="text-Color7A7A7A mb-6">
                    Pemerintah kabupaten memperoleh banyak manfaat dari pelaksanaan CSR. Salah satu manfaat utama adalah
                    percepatan pembangunan di berbagai sektor. Dengan adanya dukungan dana dan sumber daya dari
                    perusahaan, pemerintah dapat lebih cepat mewujudkan program-program pembangunan yang telah
                    direncanakan, seperti pembangunan infrastruktur, peningkatan kualitas pendidikan dan kesehatan,
                    serta pengembangan ekonomi masyarakat.
                </p>
            </div>
            <div class="lg:w-1/2 h-auto mt-8 lg:mt-14 flex justify-end items-end">
                <img src="{{ asset('images/manfaat.png') }}" alt="Bupati" class="h-[350px] z-30">
                <div class="absolute bg-Gray100 h-[430px] w-[560px] hidden xl:block"></div>
            </div>
        </div>

        {{-- Laporan Program Section --}}
        <section>
            <div class="w-full md:w-3/4 mx-auto relative py-16 px-7 md:px-0 bg-white">
                <div class="flex flex-col justify-center items-center">
                    <div class="w-[44px] h-[4px] bg-Orange600"></div>
                    <h1 class="text-Ebony900 lg:text-4xl text-3xl font-bold mt-4 max-w-80 text-center">Laporan
                        Program Terbaru</h1>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-7 p-6">
                    <!-- Card 1 -->
                    @foreach($laporan as $item)
                    @php
                    $gambarLaporan = json_decode($item['gambar_laporan'], true);
                    @endphp
                    <a href="{{route('laporan.detailLaporan', $item->id)}}" class="block h-full">
                        <div class="bg-white border border-Neutral300 overflow-hidden flex flex-col h-full relative">
                            <img class="w-full h-72 object-cover" src="{{ asset('storage/img/laporan/'. $gambarLaporan[0]) }}" alt="Image 1">
                            <!-- Date overlay -->
                            <span class="text-xs text-white bg-AccentRed900 px-4 py-2 rounded absolute top-5 left-5 z-20">
                                {{$item->tanggal}} {{$item->bulan}} {{$item->tahun}}
                            </span>
                            <div class="p-6 flex flex-col flex-grow">
                                <h2 class="mt-2 text-xl font-bold text-Ebony900">{{$item->judul}}</h2>
                                <p class="mt-2 text-Ebony100 flex-grow">{{$item->deskripsi}}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>                
                <a href="publik/laporan"
                    class="bg-white hover:bg-neutral-100 border border-Neutral300 font-semibold rounded-lg text-Ebony200 px-4 py-2 w-fit flex justify-center items-center my-7 mx-auto">Lihat
                    semua laporan program
                </a>
            </div>
        </section>

        {{-- Sambutan Bupati Section --}}
        <section>
            <div class="relative py-16 bg-white w-full md:w-3/4 mx-auto px-7 md:px-0">
                <div class="flex flex-col lg:flex-row items-center">
                    <div class="lg:w-1/2 lg:pr-16 z-50">
                        <div class="w-[40px] h-[4px] bg-AccentRed400 mb-5 z-50"></div>
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
                        <img src="{{ asset('images/bupati.png') }}" alt="Bupati" class="md:h-[380px] h-[265px] z-30">
                        <div class="absolute bg-Gray100 h-[430px] w-[560px] hidden xl:block"></div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Panduan Section --}}
        <section class="bg-Gray900">
            <div class="w-full md:w-3/4 mx-auto px-7 md:px-0 relative py-24">
                <div class="flex flex-col justify-center items-center mb-10">
                    <div class="w-[44px] h-[4px] bg-AccentRed400"></div>
                    <h1 class="text-white lg:text-4xl text-3xl font-bold mt-4 max-w-80 text-center">Panduan</h1>
                    <h1 class="text-white lg:text-xl text-lg mt-4 text-center">Bagaimana proses CSR berlangsung</h1>
                </div>

                <div class="flex flex-col relative justify-center items-center w-full">
                    <div class="bg-white lg:block hidden w-2/3 h-px absolute top-5"></div>
                    <div
                        class="flex lg:flex-col sm:flex-row flex-col relative justify-center items-center sm:items-stretch lg:items-center w-full">
                        <div
                            class="flex lg:flex-row flex-col lg:px-0 sm:pl-20 w-[90%] sm:w-auto lg:w-2/3 justify-around lg:justify-between items-center z-10 sm:space-y-0 space-y-10">
                            <div class="flex flex-col items-center text-center justify-center font-semibold">
                                <p class="text-white text-xl rounded-lg py-2 px-4 bg-AccentRed900 sm:mb-0 mb-4">1</p>

                                {{-- Saat sm keatas hilang, saat sm kebawah muncul --}}
                                <p class="text-white font-semibold sm:hidden block">Penyerahan Proposal CSR</p>
                                <p class="text-white text-sm sm:hidden block">Pihak penerima menyerahkan proposal
                                    terkait
                                    CSR kepada Perusahaan yang akan di tuju.Jika perusahaan meminta rekomendasi Bupati
                                    Cirebon maka pihak penerima perlu membuat surat permohonan penerbitan surat
                                    rekomendasi
                                    CSR kepada Bupati dengan melampirkan dokumen proposal kegiatan.</p>
                            </div>
                            <div class="flex flex-col items-center text-center justify-center font-semibold">
                                <p class="text-white text-xl rounded-lg py-2 px-4 bg-AccentRed900 sm:mb-0 mb-4">2</p>

                                {{-- Saat sm keatas hilang, saat sm kebawah muncul --}}
                                <p class="text-white font-semibold sm:hidden block">Permohonan Penerbitan Surat CSR</p>
                                <p class="text-white text-sm sm:hidden block">Permohonan penerbitan surat rekomendasi
                                    CSR
                                    yang sudah masuk akan di disposisikan kepada Bagian Perekonomian dan SDA untuk di
                                    tindak
                                    lanjuti.Setelah Surat rekomendasi CSR di tandatangani Bupati maka pihak penerima
                                    perlu
                                    mengambil surat tersebut dan menyerahkan nya kepada perusahaan.</p>
                                <span class="text-white mt-1 font-semibold text-base sm:hidden block">Permohonan
                                    Penerbitan
                                    Surat CSR</span>
                            </div>
                            <div class="flex flex-col items-center text-center justify-center font-semibold">
                                <p class="text-white text-xl rounded-lg py-2 px-4 bg-AccentRed900 sm:mb-0 mb-4">3</p>

                                {{-- Saat sm keatas hilang, saat sm kebawah muncul --}}
                                <p class="text-white font-semibold sm:hidden block">Laporan CSR</p>
                                <p class="text-white text-sm sm:hidden block">Setelah perusahaan menerima surat
                                    rekomendasi
                                    CSR maka selanjutnya pihak perusahaan berhubungan langsung dengan pihak penerima
                                    tanpa
                                    ada intervensi dari pemda, di akhir tahun berjalan perusahaan yang mengeluarkan CSR
                                    perlu melaporkan penyaluran CSR tersebut kepada Pemda sebagai laporan kepada Bupati.
                                </p>
                            </div>
                        </div>

                        <div class="flex lg:flex-row flex-col w-[96%] items-start justify-around lg:justify-between">
                            <div
                                class="flex flex-col lg:items-center text-left lg:text-center justify-center py-4 px-9">
                                <p class="text-white font-semibold sm:block hidden">Penyerahan Proposal CSR</p>
                                <p class="text-white text-sm sm:block hidden">Pihak penerima menyerahkan proposal
                                    terkait
                                    CSR kepada Perusahaan yang akan di tuju.Jika perusahaan meminta rekomendasi Bupati
                                    Cirebon maka pihak penerima perlu membuat surat permohonan penerbitan surat
                                    rekomendasi
                                    CSR kepada Bupati dengan melampirkan dokumen proposal kegiatan.</p>
                            </div>

                            <div
                                class="flex flex-col lg:items-center text-left lg:text-center justify-center py-4 px-9">
                                <p class="text-white font-semibold sm:block hidden">Permohonan Penerbitan Surat CSR</p>
                                <p class="text-white text-sm sm:block hidden">Permohonan penerbitan surat rekomendasi
                                    CSR
                                    yang sudah masuk akan di disposisikan kepada Bagian Perekonomian dan SDA untuk di
                                    tindak
                                    lanjuti.Setelah Surat rekomendasi CSR di tandatangani Bupati maka pihak penerima
                                    perlu
                                    mengambil surat tersebut dan menyerahkan nya kepada perusahaan.</p>
                                <span class="text-white mt-1 font-semibold text-base sm:block hidden">Permohonan
                                    Penerbitan
                                    Surat CSR</span>
                            </div>

                            <div
                                class="flex flex-col lg:items-center text-left lg:text-center justify-center py-4 px-9">
                                <p class="text-white font-semibold sm:block hidden">Laporan CSR</p>
                                <p class="text-white text-sm sm:block hidden">Setelah perusahaan menerima surat
                                    rekomendasi
                                    CSR maka selanjutnya pihak perusahaan berhubungan langsung dengan pihak penerima
                                    tanpa
                                    ada intervensi dari pemda, di akhir tahun berjalan perusahaan yang mengeluarkan CSR
                                    perlu melaporkan penyaluran CSR tersebut kepada Pemda sebagai laporan kepada Bupati.
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="py-3 px-5 bg-AccentRed900 hover:bg-red-900 rounded-lg text-white mt-4">
                        Ajukan surat rekomendasi CSR
                    </button>
                </div>
            </div>
        </section>

        {{-- Contact US Section --}}
        <div
            class="w-full md:w-3/4 px-7 md:px-0 rounded-lg py-10 mx-auto flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-10">
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
        <x-footer-umum></x-footer-umum>
    </div>
</x-guest-layout>