




<x-app-layout>
    @if(Auth::user()->level === 'admin')
    @include('components.navbar-admin')


<div class="flex flex-col w-full min-h-screen">

    
    <div class="flex-grow p-7 mx-auto w-full max-w-screen-2xl h-full">
        <!-- Breadcrumb -->
        <div class="flex items-center space-x-2 mb-4">
            <a href="#" class="flex items-center text-Ebony100">
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
            <span class="text-sm font-medium text-Ebony100 px-2 py-1 rounded-md">Kegiatan</span>
            <a class="flex items-center text-Ebony100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
            <span class="text-sm font-medium text-AccentRed900 bg-red-100 px-2 py-1 rounded-md">Ubah Kegiatan</span>
        </div>

        <h2 class="text-2xl font-bold mb-6 mt-10 text-Ebony900">Ubah Kegiatan</h2>

        <!-- Form Section -->
        <div class="bg-white p-8 rounded-lg shadow-md max-w-screen-2xl mx-auto mt-6">
            <form method="POST" action="{{route('kegiatan.update', $kegiatan->id)}}" class="flex flex-col gap-6" enctype="multipart/form-data" id="myForm">
                @csrf
                {{method_field('PUT')}}

                <!-- Thumbnail Section -->
                <div class="col-span-1 flex flex-col justify-start">
                    <div class="mb-4">
                        <label class="block text-Ebony900 font-semibold mb-2" for="photo">Foto Thumbnail<span
                                class="text-AccentRed900 ml-1">*</span></label>
                        <div class="border-2 border-dashed border-Neutral300 rounded-lg w-full h-40 flex flex-col justify-center items-center cursor-pointer"
                            onclick="document.getElementById('fileInput').click()">
                            <div class="w-10 h-10 bg-AccentRed100 rounded-full flex items-center justify-center mr-4">
                                <div class="bg-Red100 w-8 h-8 rounded-full flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-5 text-AccentRed900">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                    </svg>
                                </div>
                            </div>
                            <span id="uploadText" class="text-Ebony100 text-center mt-2">
                                <span class="text-AccentRed900 font-semibold">Klik untuk unggah </span>
                                atau seret dan lepas kesini <br> PNG, JPG up to 10MB
                            </span>
                        </div>
                        <input type="file" id="fileInput" name="mitra_logo" class="hidden" >
                    </div>
                </div>

                <!-- Title Section -->
                <div class="mb-4">
                    <label class="block text-Ebony900 font-semibold mb-2" for="title">Judul Kegiatan<span
                            class="text-AccentRed900 ml-1">*</span></label>
                    <input class="w-full px-4 py-2 border border-Neutral300 rounded-lg" type="text" name="judul"
                        value="{{$kegiatan->judul}}">
                </div>

                <!-- Tags Section -->
                <div class="mb-4">
                    <label class="block text-Ebony900 font-semibold mb-2" for="tags">Tags<span
                            class="text-AccentRed900 ml-1">*</span></label>
                    <input id="tags" name="tags" value="{{$kegiatan->tags}}"
                        class="w-full px-4 py-2 border border-Neutral300 rounded-lg mt-2" />
                </div>

                <!-- Description Section -->
                <div class="mb-4">
                    <label class="block text-Ebony900 font-semibold mb-2" for="description">Deskripsi</label>
                    <div id="description-editor" name="deskripsi" class="w-full px-4 py-2 border border-Neutral300 rounded-lg">{!!$kegiatan->deskripsi!!}</div>
                    <input type="hidden" id="descriptionInput" value="" name="deskripsi">
                </div>

                <input type="number" hidden id="statusInput" value="" name="status">


        </div>

        <!-- Buttons Section -->
        <div class="bg-white shadow-md rounded-lg p-4 px-10 mt-7 mb-20">
            <div class="flex w-full justify-center md:justify-end space-x-4">
               <button id="submitButtons"
                    class="px-4 py-2 bg-white text-Ebony300 border border-Neutral300 rounded-lg flex justify-center items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                    </svg>
                    Simpan Sebagai Draft
                </button>
                <button id="submitButton" class="px-4 py-2 bg-AccentRed900 text-white rounded-lg flex justify-center items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                    Terbitkan Kegiatan
                </button> 
            </div>
        </div>
        </form>


    </div>
    <x-footer></x-footer>
</div>

<script>
    document.getElementById('fileInput').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            console.log('Selected file:', file.name);
            document.getElementById('uploadText').innerHTML =
                `Selected file: <span class="font-semibold text-AccentRed900">${file.name}</span>`;
        }
    });

    var input = document.querySelector('input[name=tags]');
    new Tagify(input, {
        whitelist: ["Bank BJB", "Cirebon"],
        dropdown: {
            enabled: 0
        },
        classNames: {
            tag: "bg-Blue600 text-white rounded-lg px-2 py-1 flex items-center space-x-1 mt-2 ml-3",
            tagText: "text-xs font-medium",
            remove: "text-white ml-2",
        }
    });

    var quill = new Quill('#description-editor', {
        theme: 'snow',
        placeholder: 'Masukan deskripsi',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                ['blockquote'],
                [{
                    'header': 1
                }, {
                    'header': 2
                }],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'align': []
                }],
                [{
                    'size': ['small', false, 'large', 'huge']
                }],
                [{
                    'font': []
                }],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                ['clean']
            ]
        }
    });
    document.getElementById('submitButton').addEventListener('click', function(event) {
        const descriptionInput = document.getElementById('descriptionInput');
        const statusInput = document.getElementById('statusInput');
        descriptionInput.value = quill.root.innerHTML;
        statusInput.value = '1'; 

        // Submit form setelah input tersembunyi diisi
        document.getElementById('myForm').submit();
    });
    document.getElementById('submitButtons').addEventListener('click', function(event) {
        const descriptionInput = document.getElementById('descriptionInput');
        const statusInput = document.getElementById('statusInput');
        descriptionInput.value = quill.root.innerHTML;

        statusInput.value = '0'; 

        // Submit form setelah input tersembunyi diisi
        document.getElementById('myForm').submit();
    });


</script>
    @else

    @include('components.navbar-mitra')


    <div class="flex flex-col items-center justify-center w-full min-h-screen bg-white">
        <h1 class="text-4xl font-bold text-AccentRed900 mb-4">404</h1>
        <p class="text-lg text-Ebony900 mb-4">Oops! Halaman yang Anda cari tidak ditemukan.</p>
        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-AccentRed900 text-white rounded-lg">Kembali ke Dashboard</a>
    </div>
    
    <x-footer></x-footer>

@endif


</x-app-layout>

