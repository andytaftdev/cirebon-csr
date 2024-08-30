<x-app-layout>
    @include('components.navbar-admin')

    <!-- Bagian Header dengan Icon Home -->
    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto p-5 flex items-center space-x-2">
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
        <a href="{{route('sektor.index')}}">
            <span class="text-sm font-medium px-2 py-1 rounded-md text-Ebony100">Sektor</span>
        </a>
        <a class="flex items-center text-Ebony100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </a>
        <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Buat sektor baru</span>
    </div>

    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto mt-6">
        <h1 class="text-2xl font-semibold text-gray-800">Buat sektor baru</h1>
    </div>

    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto mt-6 mb-16">
        <!-- Form Ubah Data Sektor -->
        <form enctype="multipart/form-data" action="{{route('sektor.store')}}" method="post">
            @csrf
            <div class="bg-white border border-Neutral200 rounded-lg p-6 mb-6">
                <!-- Foto Thumbnail -->
                <div class="mb-6 font-medium">
                    <label class="block mb-2 text-sm font-medium text-gray-700" for="foto-thumbnail">
                        Foto Thumbnail <span class="text-AccentRed900">*</span>
                    </label>

                    <div class="flex flex-col justify-center items-center w-full h-32 border-2 border-dashed rounded-lg cursor-pointer border-Neutral200 hover:border-AccentRed900"
                        onclick="document.getElementById('fileInput').click()">
                        <div class="w-10 h-10 bg-AccentRed100 rounded-full flex items-center justify-center">
                            <div class="bg-Red100 w-8 h-8 rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-5 text-AccentRed900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                </svg>
                            </div>
                        </div>
                        <span id="uploadText" class="text-Ebony100 font-normal text-center mt-2">
                            <span class="text-AccentRed900 font-semibold">Klik untuk unggah </span>
                            atau seret dan lepas kesini <br> PNG, JPG up to 10MB
                        </span>
                    </div>
                    <input type="file" id="fileInput" name="gambar_sektor" class="hidden"
                        accept="image/png, image/jpeg">
                </div>

                <!-- Nama Sektor -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-700" for="nama-sektor">
                        Nama Sektor <span class="text-AccentRed900">*</span>
                    </label>
                    <input type="text" name="nama_sektor" class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                        placeholder="Nama Sektor" />
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-700" for="deskripsi">
                        Deskripsi
                    </label>
                    <textarea name="deskripsi_sektor" class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                        rows="3" placeholder="Masukan Deskripsi"></textarea>
                </div>

                <!-- Daftar Program -->
                <div>
                    <label class="block mb-2 text-lg font-semibold text-gray-700">
                        Daftar Program
                    </label>

                    <!-- Program Item 1 -->
                    <div id="program-list">
                        <div class="program-item flex flex-col md:flex-row mb-4 gap-4">
                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-700" for="nama-program-1">
                                    Nama Program <span class="text-AccentRed900">*</span>
                                </label>
                                <input type="text" name="nama_program[]"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                                    placeholder="Masukkan nama program" />
                            </div>
                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-700" for="deskripsi-program-1">
                                    Deskripsi Program <span class="text-AccentRed900">*</span>
                                </label>
                                <textarea name="deskripsi[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                                    rows="2" placeholder="Masukkan deskripsi program"></textarea>
                            </div>
                            <div class="flex justify-center md:justify-start items-center gap-4">
                                <button type="button"
                                    class="add-program-btn p-2 border border-gray-300 text-black rounded-lg flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                                <button type="button"
                                    class="remove-program-btn p-2 border border-gray-300 text-black rounded-lg flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
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
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert"
                        aria-hidden="true">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1 1 0 0 1-1.414 0L10 11.415l-2.934 2.934a1 1 0 1 1-1.414-1.414l2.934-2.934-2.934-2.934a1 1 0 0 1 1.414-1.414L10 8.585l2.934-2.934a1 1 0 0 1 1.414 1.414l-2.934 2.934 2.934 2.934a1 1 0 0 1 0 1.414z" />
                        </svg>
                    </button>
                </div>
                @endif
            </div>

            <!-- Button Actions -->
            <div
                class="flex justify-center items-center md:justify-end rounded-lg border border-Neutral200 bg-white py-4 px-6 space-x-4">
                <button type="submit"
                    class="px-4 py-2 text-sm md:text-base bg-AccentRed900 hover:bg-red-700 text-nowrap text-white rounded-lg text-center flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                    Submit</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('fileInput');
            const uploadText = document.getElementById('uploadText');
            const programList = document.getElementById('program-list');

            // Function to update file name display
            fileInput.addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    uploadText.innerHTML =
                        `Selected file: <span class="font-semibold text-AccentRed900">${file.name}</span>`;
                } else {
                    uploadText.innerHTML =
                        `<span class="text-AccentRed900 font-semibold">Klik untuk unggah </span>
                        atau seret dan lepas kesini <br> PNG, JPG up to 10MB`;
                }
            });

            // Function to add a new program item
            function addProgramItem() {
                const newProgramItem = document.createElement('div');
                newProgramItem.classList.add('program-item', 'flex', 'flex-col', 'md:flex-row', 'mb-4',
                'gap-4');
                newProgramItem.innerHTML = `<div class="w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-700" for="nama-program-1">
                                Nama Program <span class="text-AccentRed900">*</span>
                            </label>
                            <input type="text" name="nama_program[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                                placeholder="Masukkan nama program" />
                        </div>
                        <div class="w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-700" for="deskripsi-program-1">
                                Deskripsi Program <span class="text-AccentRed900">*</span>
                            </label>
                            <textarea name="deskripsi[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg" rows="2"
                                placeholder="Masukkan deskripsi program"></textarea>
                        </div>
                        <div class="flex justify-center md:justify-start items-center gap-4">
                            <button type="button" class="add-program-btn p-2 border border-gray-300 text-black rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                            <button type="button" class="remove-program-btn p-2 border border-gray-300 text-black rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>`;
                programList.appendChild(newProgramItem);

                // Add event listeners to new buttons
                newProgramItem.querySelector('.add-program-btn').addEventListener('click', addProgramItem);
                newProgramItem.querySelector('.remove-program-btn').addEventListener('click', function () {
                    removeProgramItem(newProgramItem);
                });
            }

            // Function to remove a program item
            function removeProgramItem(programItem) {
                if (programList.children.length > 1) {
                    programList.removeChild(programItem);
                }
            }

            // Initial event listeners
            document.querySelectorAll('.add-program-btn').forEach(button => {
                button.addEventListener('click', addProgramItem);
            });

            document.querySelectorAll('.remove-program-btn').forEach(button => {
                button.addEventListener('click', function (event) {
                    const programItem = event.target.closest('.program-item');
                    removeProgramItem(programItem);
                });
            });
        });

    </script>

</x-app-layout>
