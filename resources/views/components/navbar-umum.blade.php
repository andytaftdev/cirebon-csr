{{-- Navbar Section --}}
<div class="w-full bg-white border-b border-Neutral300">
    <div class="md:w-full xl:w-3/4 mx-auto flex justify-between items-center p-4 bg-white">
        <div class="flex items-center">
            <img src="{{ asset('images/csr-logo.png') }}" alt="Logo" class="h-10">
        </div>
        <div class="hidden lg:flex items-center">
            <a class="w-auto h-auto" href="/">
                <p
                    class="mt-1 mb-1 mr-8text-Ebony900 hover:text-AccentRed900 hover:font-semibold">
                    Beranda</p>
            </a>
            <a class="w-auto h-auto" href="/tentang">
                <p
                    class="mt-1 mb-1 mr-8 text-Ebony900 hover:text-AccentRed900 hover:font-semibold font-normal">
                    Tentang</p>
            </a>
            <a class="w-auto h-auto" href="/publik/kegiatan">
                <p
                    class="mt-1 mb-1 mr-8 text-Ebony900 hover:text-AccentRed900 hover:font-semibold font-normal">
                    Kegiatan</p>
            </a>
            <a class="w-auto h-auto" href="/statistik">
                <p
                    class="mt-1 mb-1 mr-8 text-Ebony900 hover:text-AccentRed900 hover:font-semibold font-normal">
                    Statistik</p>
            </a>
            <a class="w-auto h-auto" href="/publik/sektor">
                <p
                    class="mt-1 mb-1 mr-8 text-Ebony900 hover:text-AccentRed900 hover:font-semibold font-normal">
                    Sektor</p>
            </a>
            <a class="w-auto h-auto" href="/publik/laporan">
                <p
                    class="mt-1 mb-1 mr-8 text-Ebony900 hover:text-AccentRed900 hover:font-semibold font-normal">
                    Laporan</p>
            </a>
            <a class="w-auto h-auto" href="/publik/mitra">
                <p
                    class="mt-1 mb-1 mr-8 text-Ebony900 hover:text-AccentRed900 hover:font-semibold font-normal">
                    Mitra</p>
            </a>
        </div>
        <div class="flex space-x-3">
        <div class="lg:hidden flex items-center">
            <button class="outline-none mobile-menu-button">
                <!-- Menu Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 menu-icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!-- Close Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 close-icon hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <a href="/dashboard">
        <button
        class="hidden md:block text-white bg-AccentRed900 py-2 px-6 rounded-lg text-base hover:bg-red-700 cursor-pointer">
        Pengajuan
    </button></a>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div class="hidden mobile-menu lg:hidden border-t border-Neutral300">
        <a href="#"
            class="block text-sm px-7 py-4 text-AccentRed900 underline underline-AccentRed900 underline-offset-8 hover:bg-gray-200 font-semibold">Beranda</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Tentang</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Kegiatan</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Statistik</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Sektor</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Laporan</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Mitra</a>
        <div class="w-full block md:hidden p-5">
            <button
                class=" text-white bg-AccentRed900 w-full h-auto py-2 rounded-lg text-sm hover:bg-red-700 cursor-pointer">
                Pengajuan
            </button>
        </div>
    </div>
    {{-- End Mobile Menu --}}
</div>
{{-- End Navbar Section --}}

<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");
    const menuIcon = document.querySelector(".menu-icon");
    const closeIcon = document.querySelector(".close-icon");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
        menuIcon.classList.toggle("hidden");
        closeIcon.classList.toggle("hidden");
    });

</script>
