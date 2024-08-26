<x-app-layout>
    @include('components.navbar-admin')

    <div class="flex flex-col w-full min-h-screen">
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
            <span class="text-sm font-medium text-Ebony100 px-2 py-1 rounded-md">Profile</span>
            <a class="flex items-center text-Ebony100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
            <span class="text-sm font-medium text-AccentRed900 bg-red-100 px-2 py-1 rounded-md">Ubah Profile</span>
        </div>

        <h2 class="text-2xl font-bold mb-6 mt-10 text-Ebony900">Buat mitra</h2>

        <!-- Profile Update Form -->
        <div class="bg-white p-8 rounded-lg shadow-md max-w-screen-2xl mx-auto mt-6">
            <form method="POST" action="{{route('identity.register')}}" class="grid grid-cols-1 md:grid-cols-2 gap-6" enctype="multipart/form-data">
                @csrf
                <!-- Image Section -->
                <div class="col-span-1">
                    <img id="preview" src="{{ $identity->mitra_logo ?? '' }}" class="w-full h-60 md:h-80 bg-cover bg-center rounded-lg" style="background-image: url('{{ asset('images/pp.jpg') }}');">
               
                </div>

                <!-- Upload Image Section -->
                <div class="col-span-1 flex flex-col justify-start">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="photo">Foto<span
                                class="text-AccentRed900 ml-1">*</span></label>
                        <div
                            class="border-2 border-dashed border-Neutral300 rounded-lg w-full h-40 flex flex-col justify-center items-center"
                            id="upload">
                            <div class="w-10 h-10 bg-AccentRed100 rounded-full flex items-center justify-center mr-4 cursor-pointer">
                                <div class="bg-Red100 w-8 h-8 rounded-full flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-5 text-AccentRed900">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                    </svg>
                                </div>
                            </div>
                            <span class="text-Ebony100 text-center">
                                <span class="text-AccentRed900 font-semibold">Klik untuk unggah </span>
                                atau seret dan lepas kesini <br> PNG, JPG up to 10MB
                            </span>
                        </div>
                        <input type="file" id="file-input" name="mitra_logo"  class="hidden">
                    </div>
                </div>

                <!-- Form Section -->
                <div class="col-span-1">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="nama_mitra">Nama Mitra<span
                                class="text-AccentRed900 ml-1">*</span></label>
                        <input class="w-full px-4 py-2 border border-Neutral300 rounded-lg" type="text" name="name"
                            placeholder="Nama Mitra" >
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="email">Email<span
                                class="text-AccentRed900 ml-1">*</span></label>
                        <input class="w-full px-4 py-2 border border-Neutral300 rounded-lg" type="email" name="email"
                            placeholder="Email" >
                    </div>
                </div>
                <div class="col-span-1">
                <div class="mb-4">
                        <label for="password" class="block text-Ebony900 font-semibold">Kata Sandi <span
                                class="text-AccentRed900">*</span></label>
                        <div class="relative">
                            <input type="password" name="password" id="password"
                                class="mt-2 w-full p-3 border border-Neutral300 rounded-lg"
                                placeholder="Masukan kata sandi" >
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
                </div>
                <div class="col-span-1">
                <div class="mb-6">
                        <label for="password_confirmation" class="block text-Ebony900 font-semibold">Konfirmasi Kata Sandi
                            <span class="text-AccentRed900">*</span></label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="mt-2 w-full p-3 border border-Neutral300 rounded-lg"
                                placeholder="Konfirmasi kata sandi" >
                            <span id="toggleConfirmPassword" class="absolute top-5 right-4 flex items-center text-Ebony300 cursor-pointer">
                                <!-- Eye Icon -->
                                <svg id="eyeConfirmIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

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

        <!-- Buttons Section -->
        <div class="bg-white shadow-md rounded-lg p-4 px-10 mt-7 mb-20">
            <div class="flex w-full justify-center md:justify-end space-x-4">
               <a href="/mitra"><button type="button" class="px-4 py-2 bg-white text-Ebony300 border border-Neutral300 rounded-lg">Kembali</button></a> 
               
                <button type="submit" class="px-4 py-2 bg-AccentRed900 text-white rounded-lg flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    Simpan
                </button>
            </form>

            </div>
        </div>
    </div>
</div>

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

    function togglePasswordVisibility(toggleId, passwordId, eyeIconId) {
        const toggle = document.getElementById(toggleId);
        const password = document.getElementById(passwordId);
        const eyeIcon = document.getElementById(eyeIconId);

        toggle.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle eye icon
            eyeIcon.innerHTML = type === 'password' ?
                `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />` :
                `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />`;
        });
    }

    // Initialize toggle for password fields
    togglePasswordVisibility('togglePassword', 'password', 'eyeIcon');
    togglePasswordVisibility('toggleConfirmPassword', 'password_confirmation', 'eyeConfirmIcon');
</script>

</x-app-layout>
