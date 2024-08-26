<x-guest-layout>
<!-- <div class="min-h-screen flex flex-col justify-between">
        {{-- Navbar Section --}}
        <div class="w-full bg-white">
            <div class="container mx-auto flex justify-center items-center p-4 bg-white">
                <div class="flex items-center">
                    <img src="{{ asset('images/csr-logo.png') }}" alt="Logo" class="h-10">
                </div>
            </div>
        </div>
        {{-- End Navbar Section --}}

        <div class="flex-grow flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-7xl bg-white rounded-lg shadow-md flex flex-col md:flex-row overflow-hidden px-0">
                <div class="w-full md:w-1/2 flex flex-col justify-center p-8 md:px-20">
                    <a href="{{ url('/') }}" class="text-AccentRed900 flex items-center font-medium">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke halaman utama
                    </a>
                    <h2 class="text-3xl font-semibold mt-6 text-Ebony900">Selamat Datang</h2>
                    <p class="text-Ebony300 mt-2">Silakan masukan email dan kata sandi untuk masuk ke halaman dashboard Anda
                    </p>
                    
                    <a href="{{ route('register') }}"
                        class="font-semibold text-Ebony900 mt-5 inline-block border border-Neutral300 w-fit rounded-lg px-4 py-2">
                        Belum punya akun mitra? <span class="text-AccentRed900">Registrasi di sini</span>
                    </a>
                </div>
                <div class="w-full md:w-1/2 flex flex-col justify-center h-full md:border-t-0 md:border-l py-20 px-8">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-Ebony900 font-semibold">Email <span
                                    class="text-AccentRed900">*</span></label>
                            <input type="email" name="email" id="email"
                                class="mt-2 w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-AccentRed900"
                                placeholder="Masukan email Anda" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-Ebony900 font-semibold">Kata Sandi <span
                                    class="text-AccentRed900">*</span></label>
                            <div class="relative">
                                <input type="password" name="password" id="password"
                                    class="mt-2 w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-AccentRed900"
                                    placeholder="Masukan kata sandi" required>
                                <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-Ebony300">
                                    <i class="fas fa-eye"></i>
                                </span>
                                   <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>
                        </div>
                        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center mb-4">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
                        <button type="submit" class="w-full text-white p-3 rounded-lg" style="background-color: #98100A;">Masuk</button>
                    </form>
                </div>
            </div>
        </div>

        <footer class="bg-Ebony900 p-6 w-full">
            <div class="container mx-auto flex flex-col md:flex-row">
                <div class="w-full flex flex-col text-white">
                    <p>&copy; 2024 Corporate Social Responsibility Kabupaten Cirebon</p>
                    <p>Pemkab Kabupaten Cirebon, Badan Pendapatan Daerah (Bapenda) Kabupaten Cirebon.</p>
                </div>
                <div class="mt-4 md:mt-0 md:ml-auto">
                    <a href="#" class="inline-block text-white py-2 px-4 w-64 rounded-lg border border-Neutral300">
                        Kembali Ke Halaman Utama
                    </a>
                </div>
            </div>
        </footer>
    </div> -->

    <div class="min-h-screen flex flex-col justify-between">
    {{-- Navbar Section --}}
    <div class="w-full bg-white">
        <div class="container mx-auto flex justify-center items-center p-4 bg-white">
            <div class="flex items-center">
                <img src="{{ asset('images/csr-logo.png') }}" alt="Logo" class="h-10">
            </div>
        </div>
    </div>
    {{-- End Navbar Section --}}

    <div class="flex-grow flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-7xl bg-white rounded-lg shadow-md flex flex-col md:flex-row overflow-hidden px-0">
            <div class="w-full md:w-1/2 flex flex-col justify-center p-8 md:px-20">
                <a href="{{ url('/') }}" class="text-AccentRed900 flex items-center font-medium gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        <p>Kembali ke halaman utama</p>
                    </svg>
                </a>
                <h2 class="text-3xl font-semibold mt-5 text-Ebony900">Selamat Datang</h2>
                <p class="text-Ebony300 mt-2">Silakan masukan email dan kata sandi untuk masuk ke halaman dashboard Anda
                </p>
                <a href="{{route('register')}}"
                    class="font-semibold text-Ebony900 mt-5 inline-block border border-Neutral300 w-fit rounded-lg px-4 py-2">
                    Belum punya akun mitra? <span class="text-AccentRed900">Registrasi di sini</span>
                </a>
            </div>
            <div class="w-full md:w-1/2 flex flex-col justify-center h-full md:border-t-0 md:border-l py-20 px-8">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-Ebony900 font-semibold">Email <span
                                class="text-AccentRed900">*</span></label>
                        <input type="email" name="email" id="email"
                            class="mt-2 w-full p-3 border border-Neutral300 rounded-lg" placeholder="Masukan email Anda"
                            required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-Ebony900 font-semibold">Kata Sandi <span
                                class="text-AccentRed900">*</span></label>
                        <div class="relative">
                            <input type="password" name="password" id="password"
                                class="mt-2 w-full p-3 border border-Neutral300 rounded-lg"
                                placeholder="Masukan kata sandi" required>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            <span id="togglePassword" class="absolute top-5 right-4 flex items-center text-Ebony300 cursor-pointer">
                                <!-- Eye Icon -->
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white p-3 rounded-lg"
                        style="background-color: #98100A;">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-Ebony900 p-6 w-full">
        <div class="container mx-auto flex flex-col md:flex-row">
            <div class="w-full flex flex-col text-white">
                <p>&copy; 2024 Corporate Social Responsibility Kabupaten Cirebon</p>
                <p>Pemkab Kabupaten Cirebon, Badan Pendapatan Daerah (Bapenda) Kabupaten Cirebon.</p>
            </div>
            <div class="mt-4 md:mt-0 md:ml-auto">
                <a href="{{ url('/') }}" class="inline-block text-white py-2 px-4 w-64 rounded-lg border border-Neutral300">
                    Kembali Ke Halaman Utama
                </a>
            </div>
        </div>
    </footer>
</div>

<!-- JavaScript to toggle icon and password visibility -->
<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
        // Toggle the type attribute of the password field
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle the eye icon to eye-slash icon
        eyeIcon.innerHTML = type === 'password' ? 
            `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />` : 
            `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />`;
    });
</script>
</x-guest-layout>

