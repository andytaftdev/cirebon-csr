<x-app-layout>

    @include('components.navbar-admin')

    <main class="flex-grow"> 


    @if($proyek->status === 'terbit')

    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto p-5 flex items-center space-x-2">
        <a href="/dashboard" class="flex items-center text-Ebony100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-Ebony100">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{route('proyek.index')}}">
            <span class="text-sm font-medium px-2 py-1 rounded-md text-Ebony100">Proyek</span>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-Ebony100">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Detail</span>
    </div>

    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto mt-6">
        <!-- Header -->
        <h2 class="text-2xl font-semibold text-Gray900 mb-6">Detail Laporan</h2>
    </div>

    <div class="container w-full md:w-3/4 mx-auto bg-white p-6 flex flex-col rounded-lg shadow-md mt-6 mb-4">
        <!-- Tags -->
        <div class="flex space-x-4 mb-4">
            @if($proyek->status === 'terbit')
            <span
                class="inline-block font-medium bg-Success50 text-Success700 text-sm px-3 py-1 rounded-full">Terbit</span>
            @else
            <span
                class="inline-block font-medium bg-Warning50 text-Warning700 text-sm px-3 py-1 rounded-full">Draf</span>
            @endif
            <span
                class="inline-block font-medium bg-Gray100 text-Gray700 text-sm px-3 py-1 rounded-full">{{$sektor->nama_sektor}}</span>
            <span
                class="inline-block font-medium bg-Gray100 text-Gray700 text-sm px-3 py-1 rounded-full">{{$program->nama_program}}</span>
        </div>

        <div class="flex flex-row">
            <div class="p-4 rounded-full flex items-center justify-center">
                {{-- ICON --}}
                <div class="w-12 h-12 bg-AccentRed100 rounded-full flex items-center justify-center">
                    <div class="bg-Red100 w-8 h-8 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="h-6 w-6 text-AccentRed900">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <h3 class="text-xl md:text-2xl font-semibold text-Gray900 mb-1">{{$proyek->nama_proyek}}</h3>
            </div>
        </div>

        <div class="bg-Neutral200 w-full h-[2px] my-5 rounded-full"></div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">

        @foreach($imgName as $item)

        <div class="mx-auto w-full bg-no-repeat bg-contain h-[500px] mb-6"
            style="background-image: url('{{ asset('storage/img/proyek/'. $item) }}');">

        </div>
        @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
            <div class="p-4 space-y-2 border-l-4 border-l-AccentRed900 bg-[#FFF1F0] rounded-lg">
                <h4 class="text-sm font-reguler text-Gray900">Tanggal</h4>
                <p class="text-md font-semibold text-Gray900">
                    {{$proyek->firstDay}} {{$proyek->firstMonth}} {{$proyek->firstYear}}
                    -
                    {{$proyek->lastDay}} {{$proyek->lastMonth}} {{$proyek->lastYear}}

                </p>
            </div>
            <div class="p-4 space-y-2 border-l-4 border-l-AccentRed900 bg-[#FFF1F0] rounded-lg">
                <h4 class="text-sm font-reguler text-Gray900">Kecamatan</h4>
                <p class="text-md font-semibold text-Gray900">Kec. {{$proyek->kecamatan}}</p>
            </div>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-Gray900 mb-2">Rincian Laporan</h2>
            <p class="text-Gray900 leading-relaxed mb-3">
                {{$proyek->deskripsi1}}
            </p>
            <p class="text-Gray900 leading-relaxed">
                {{$proyek->deskripsi2}}
            </p>
        </div>

        <div class="bg-Neutral200 w-full h-[2px] my-5 rounded-full"></div>

        <h1 class="font-semibold text-xl md:text-2xl">Mitra Yang Berpartisipasi</h1>

        <div class="mt-6 bg-white border border-Neutral200 rounded-lg overflow-hidden">
            <!-- Add overflow-x-auto wrapper here -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-white border-b rounded-t-lg">
                        <tr>
                            <th class="text-left px-6 py-3 text-sm text-Gray900 font-semibold uppercase tracking-wider">
                                Nama Mitra
                            </th>
                            <th class="text-left px-6 py-3 text-sm text-Gray900 font-semibold uppercase tracking-wider">
                                Email
                            </th>
                            <th class="text-left px-6 py-3 text-sm text-Gray900 font-semibold uppercase tracking-wider">
                                No. Telepon
                            </th>
                            <th class="text-left px-6 py-3 text-sm text-Gray900 font-semibold uppercase tracking-wider">
                                Tgl Mulai
                            </th>
                            <th class="text-left px-6 py-3 text-sm text-Gray900 font-semibold uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if($idUser === null)

                        @else
                        @foreach($idUser as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-Gray700">
                                {{$item->identity->nama_mitra}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-Gray700">{{$item->email}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-Gray700">{{$item->identity->nomor_hp}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-Gray700">
                                1 Juli 2024
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex items-center">
                                    <a href="{{ route('identity.detailMitra', $item->id) }}"
                                        class="text-Ebony300 hover:text-Ebony900">
                                        <!-- Eye Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
                
            </div>
            
        </div>
        @if($idUser === null)
        <div
                class="flex justify-center items-center md:justify-end rounded-lg bg-white pt-6 px-6 space-x-4 mb-2">
                <form method="POST" action="{{route('proyek.destroy', $proyek->id)}}">
                       @csrf
                      {{method_field('DELETE')}}
                    <button 
                        class="px-4 py-2 text-sm md:text-base bg-AccentRed900 hover:bg-red-700 text-white rounded-lg flex justify-center items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                        Hapus Proyek
                    </button>
                    </form>
            </div>
            @endif
    </div>
    @else
    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto p-5 flex items-center space-x-2">
        <a href="/dashboard" class="flex items-center text-Ebony100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-Ebony100">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{route('proyek.index')}}">
            <span class="text-sm font-medium px-2 py-1 rounded-md text-Ebony100">Proyek</span>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-Ebony100">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Ubah Data Proyek</span>
    </div>

    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto mt-6">
        <h2 class="text-2xl font-semibold text-Gray900 mb-6">Ubah Data Proyek</h2>
    </div>

    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto">
        <form enctype="multipart/form-data" action="{{route('proyek.update', $proyek->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="p-6 bg-white rounded-lg shadow-md mb-6">
                <!-- Nama Proyek -->
                <div class="mb-4">
                    <label class="block text-Gray900 font-medium mb-2" for="nama-proyek">
                        Nama Proyek <span class="text-AccentRed900">*</span>
                    </label>
                    <input name="nama_proyek" id="nama-proyek" value="{{$proyek->nama_proyek}}" type="text" 
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg">
                </div>

                <!-- Sektor CSR dan Program CSR -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-Gray900 font-medium mb-2" for="sektor-csr">
                            Sektor CSR <span class="text-AccentRed900">*</span>
                        </label>
                        <select name="id_sektor" id="sektor-csr"
                            class="w-full px-4 py-2 border border-Neutral200 rounded-lg text-Neutral500">
                            <option value="">Pilih program CSR</option>
                            @foreach($sektorAll as $item)
                            <option value="{{ $item->id }}">{{$item->nama_sektor}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-Gray900 font-medium mb-2" for="program-csr">
                            Program CSR <span class="text-AccentRed900">*</span>
                        </label>
                        <select name="id_program" id="program-csr"
                            class="w-full px-4 py-2 border border-Neutral200 rounded-lg text-Neutral500">
                            <option>Pilih program CSR</option>
                            <!-- Tambahkan opsi lain di sini -->
                        </select>
                    </div>
                </div>

                <!-- Lokasi Kecamatan dan Tanggal -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block text-Gray900 font-medium mb-2" for="lokasi-kecamatan">
                            Lokasi Kecamatan <span class="text-AccentRed900">*</span>
                        </label>
                        <select name="kecamatan" id="lokasi-kecamatan"
                            class="w-full px-4 py-2 border border-Neutral200 rounded-lg text-Neutral500">
                            <option value="Waled">Waled</option>
                            <option value="Ciledug">Ciledug</option>
                            <option value="Pasaleman">Pasaleman</option>
                            <option value="Losari">Losari</option>
                            <option value="Gebang">Gebang</option>
                            <option value="Karangsembung">Karangsembung</option>
                            <option value="Karangwareng">Karangwareng</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-Gray900 font-medium mb-2" for="tanggal-awal">
                            Tanggal Awal <span class="text-AccentRed900">*</span>
                        </label>
                        <input name="tanggal_mulai" id="tanggal-awal" type="date"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg text-Neutral500">
                    </div>
                    <div>
                        <label class="block text-Gray900 font-medium mb-2" for="tanggal-akhir">
                            Tanggal Akhir <span class="text-AccentRed900">*</span>
                        </label>
                        <input name="tanggal_akhir" id="tanggal-akhir" type="date"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg text-Neutral500">
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label class="block text-Gray900 font-medium mb-2" for="deskripsi">
                        Deskripsi
                    </label>
                    <textarea name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi Proyek"
                        class="w-full px-4 py-2 border border-Neutral200 rounded-lg">{{$proyek->deskripsi}}</textarea>
                </div>

                <!-- Foto Proyek -->
                <div class="mb-6">
                    <label class="block text-Ebony900 font-semibold mb-2" for="photo-proyek">Foto Proyek<span
                            class="text-AccentRed900 ml-1">*</span>
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
                    <input type="file" id="fileInput" name="gambar_proyek[]" class="hidden" accept="image/png, image/jpeg" multiple>
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

            <!-- Buttons -->
            <div
                class="flex justify-center items-center md:justify-end rounded-lg border border-Neutral200 bg-white py-4 px-6 space-x-4 mb-16">
                <button type="submit" name="status-form" value="draf"
                    class="px-4 py-2 text-sm md:text-base bg-white text-Neutral700 text-nowrap border border-Neutral300 rounded-lg text-center flex justify-center items-center hover:bg-Neutral200 gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    Simpan Sebagai Draft</button>
                <button type="submit" name="status-form" value="terbit"
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
        document.getElementById('fileInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                console.log('Selected file:', file.name);
                document.getElementById('uploadText').innerHTML =
                    `Selected file: <span class="font-semibold text-AccentRed900">${file.name}</span>`;
            }
        });
        document.getElementById('sektor-csr').addEventListener('change', function () {
            const id = this.value;

            // Kosongkan pilihan program ketika sektor berubah
            const programSelect = document.getElementById('program-csr');
            programSelect.innerHTML = '<option value="">Pilih Program</option>';

            if (id) {
                fetch(`/get-program/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(program => {
                            const option = document.createElement('option');
                            option.value = program.id;
                            option.text = program.nama_program;
                            programSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching programs:', error));
            }
        });

    </script>
    @endif

    </main>

<x-footer-admin></x-footer-admin>

</x-app-layout>
