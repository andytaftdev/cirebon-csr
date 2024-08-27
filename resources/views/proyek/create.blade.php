

<x-app-layout>
@include('components.navbar-admin')


<div class="container mx-auto p-5 flex items-center space-x-2">
    <a href="#" class="flex items-center text-Ebony100">
        <ion-icon name="home-outline"></ion-icon>
    </a>
    <ion-icon class="text-Ebony100" name="chevron-forward-outline"></ion-icon>
    <span class="text-sm font-medium px-2 py-1 rounded-md text-Ebony100">Proyek</span>
    <ion-icon class="text-Ebony100" name="chevron-forward-outline"></ion-icon>
    <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Buat Proyek Baru</span>
</div>

<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-semibold text-Gray900 mb-6">Buat Proyek Baru</h2>
</div>

<div class="container mx-auto">
    <form enctype="multipart/form-data" action="{{route('proyek.store')}}" method="post">
        @csrf
        <div class="p-6 bg-white rounded-lg shadow-md mb-6">
            <!-- Nama Proyek -->
            <div class="mb-4">
                <label class="block text-Gray900 font-medium mb-2" for="nama-proyek">
                    Nama Proyek <span class="text-AccentRed900">*</span>
                </label>
                <input name="nama_proyek" id="nama-proyek" type="text" placeholder="Masukan nama proyek CSR" class="w-full px-4 py-2 border border-gray-200 rounded-lg">
            </div>

            <!-- Sektor CSR dan Program CSR -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-Gray900 font-medium mb-2" for="sektor-csr">
                        Sektor CSR <span class="text-AccentRed900">*</span>
                    </label>
                    <select name="id_sektor" id="sektor-csr" class="w-full px-4 py-2 border border-Neutral200 rounded-lg text-Neutral500">
                    <option value="">Pilih program CSR</option>
                        @foreach($sektor as $item)
                        <option value="{{ $item->id }}">{{$item->nama_sektor}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-Gray900 font-medium mb-2" for="program-csr">
                        Program CSR <span class="text-AccentRed900">*</span>
                    </label>
                    <select name="id_program" id="program-csr" class="w-full px-4 py-2 border border-Neutral200 rounded-lg text-Neutral500">
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
                    <select name="kecamatan" id="lokasi-kecamatan" class="w-full px-4 py-2 border border-Neutral200 rounded-lg text-Neutral500">
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
                    <input name="tanggal_mulai" id="tanggal-awal" type="date" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-Neutral500">
                </div>
                <div>
                    <label class="block text-Gray900 font-medium mb-2" for="tanggal-akhir">
                        Tanggal Akhir <span class="text-AccentRed900">*</span>
                    </label>
                    <input name="tanggal_akhir" id="tanggal-akhir" type="date" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-Neutral500">
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label class="block text-Gray900 font-medium mb-2" for="deskripsi">
                    Deskripsi
                </label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi Proyek" class="w-full px-4 py-2 border border-Neutral200 rounded-lg"></textarea>
            </div>`

            <!-- Foto Proyek -->
            <div class="mb-6">
                <label class="block text-Gray900 font-medium mb-2" for="foto-proyek">
                    Foto Proyek <span class="text-AccentRed900">*</span>
                </label>
                <div class="flex justify-center items-center w-full">
                    <label for="foto-proyek" class="flex flex-col justify-center items-center w-full h-32 border-2 border-dashed rounded-lg cursor-pointer border-Neutral200 hover:border-AccentRed900">
                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                            <ion-icon class="w-10 h-10 mb-3 text-AccentRed900" name="cloud-upload-outline"></ion-icon>
                            <p class="mb-2 text-sm text-Neutral500"><span class="font-semibold text-AccentRed900">Klik untuk unggah</span> atau seret dan lepas kesini</p>
                            <p class="text-xs text-Neutral500">PNG, JPG up to 10MB</p>
                        </div>
                        <input name="gambar_proyek" id="foto-proyek" type="file" class="hidden" />
                    </label>
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

        <!-- Buttons -->
        <div class="flex justify-end rounded-lg border border-Neutral200 bg-white py-4 px-6 space-x-4 mb-16">
            <button type="submit" name="status-form" value="draf" class="px-4 py-2 bg-white text-Neutral700 font-medium border border-Neutral300 rounded-lg text-center flex justify-center items-center hover:bg-Neutral200">Simpan Sebagai Draft</button>
            <button type="submit" name="status-form" value="terbit" class="px-4 py-2 bg-red-800 font-medium text-white rounded-lg text-center flex justify-center items-center">Submit</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('sektor-csr').addEventListener('change', function() {
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

</x-app-layout>


