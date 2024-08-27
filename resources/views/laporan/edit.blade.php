<x-app-layout>


@if(Auth::user()->level === 'admin')

@else
@include('components.navbar-mitra')


<!-- Bagian Header dengan Icon Home -->
<div class="container mx-auto p-5 flex items-center space-x-2">
    <a href="#" class="flex items-center text-Ebony100">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>
    </a>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-Ebony100">
        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
    </svg>
    <span class="text-sm font-medium px-2 py-1 rounded-md text-Ebony100">Laporan</span>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-Ebony100">
        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
    </svg>
    <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Buat Laporan Baru</span>
</div>

<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-semibold text-gray-800">Buat Laporan Baru</h2>
</div>
<div class="container mx-auto mt-6 mb-16">
    <form  method="POST" action="{{route('laporan.update', $laporan->id)}}" class="flex flex-col gap-6" enctype="multipart/form-data" class="space-y-5" id="myForm">
        @csrf
        {{method_field('PUT')}}


        <div class="bg-white p-6 border border-Neutral rounded-lg">
            <!-- Judul Laporan -->
            <div class="mb-6">
                
                <label for="judul" class="block text-sm font-medium text-Gray900 mb-1">Judul Laporan <span class="text-AccentRed900">*</span></label>
                <input type="text" id="judul" name="judul" value="{{$laporan->judul}}" class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none" >
                <input type="number" id="user" name="id_user" value="{{Auth::user()->id}}" class="hidden w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none" >
            </div>

            <!-- Sektor CSR dan Program CSR -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="sektor-csr" class="block text-sm font-medium text-Gray900 mb-1">Sektor CSR <span class="text-AccentRed900">*</span></label>
                    <select id="sektor-csr" name="id_sektor" class="w-full text-Neutral500 border border-Neutral200 rounded-lg px-3 py-2 focus:outline-none">
                    <option value="">Pilih program CSR</option>
                        @foreach($sektor as $item)
                        <option value="{{ $item->id }}">{{$item->nama_sektor}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="program-csr" class="block text-sm font-medium text-Gray900 mb-1">Program CSR <span class="text-AccentRed900">*</span></label>
                    <select id="program-csr" name="id_program" class="w-full text-Neutral500 border border-Neutral200 rounded-lg px-3 py-2 focus:outline-none">
                        <option>Pilih program CSR</option>
                    </select>
                </div>
            </div>

            <!-- Nama Proyek CSR -->
            <div class="mb-6 pr-6">
                <label for="nama-proyek-csr" class="block text-sm font-medium text-Gray900 mb-1">Nama Proyek CSR</label>
                <select id="nama-proyek-csr" name="id_proyek" class="w-1/2 text-Neutral500 border border-Neutral200 rounded-lg px-3 py-2 focus:outline-none">
                <option>Pilih proyek CSR</option>
                @foreach($proyek as $uid)
                           <option value="{{ $uid->id }}" 
                                      @if($laporan->id_proyek == $uid->id) selected @endif>
                              {{ $uid->nama_proyek }}
                            </option>
                         @endforeach
                </select>
                <p class="text-sm text-Neutral500 mt-1">Kosongkan Apabila Tidak Ada Proyek Yang Sesuai</p>
            </div>

            <!-- Tanggal, Bulan, Tahun, dan Realisasi -->
            <div class="flex flex-row space-x-4 mb-6">
                <div class="w-1/2 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-Gray900 mb-1">Tanggal <span class="text-AccentRed900">*</span></label>
                        <select id="tanggal" name="tanggal" class="w-full text-Neutral500 border border-Neutral200 rounded-lg px-3 py-2 focus:outline-none">
                            <option>Pilih tanggal</option>
                            <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
                        </select>
                    </div>
                    <div>
                        <label for="bulan" class="block text-sm font-medium text-Gray900 mb-1">Bulan <span class="text-AccentRed900">*</span></label>
                        <select id="bulan" name="bulan" class="w-full text-Neutral500 border border-Neutral200 rounded-lg px-3 py-2 focus:outline-none">
                        <option value="January">January</option>
    <option value="February">February</option>
    <option value="March">March</option>
    <option value="April">April</option>
    <option value="May">May</option>
    <option value="June">June</option>
    <option value="July">July</option>
    <option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="December">December</option>
                        </select>
                    </div>
                    <div>
                        <label for="tahun" class="block text-sm font-medium text-Gray900 mb-1">Tahun <span class="text-AccentRed900">*</span></label>
                        <select id="tahun" name="tahun" class="w-full text-Neutral500 border border-Neutral200 rounded-lg px-3 py-2 focus:outline-none">
                        <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
    <option value="2007">2007</option>
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
                        </select>
                    </div>
                </div>
                <div class="w-1/2 grid grid-cols-1">
                    <div>
                        <label for="realisasi" class="block text-sm font-medium text-Gray900 mb-1">Realisasi <span class="text-AccentRed900">*</span></label>
                        <input type="text" id="realisasi" value="{{$laporan->realisasi}}" name="realisasi" class="w-full text-Neutral500 border border-gray-200 rounded-lg px-3 py-2 focus:outline-none" >
                    </div>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-Gray900 mb-1">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi"  class="w-full text-sm text-Neutral500 border border-Neutral200 rounded-lg px-3 py-2 focus:outline-none" >{{$laporan->deskripsi}}</textarea>
            </div>

            <!-- Foto Laporan Kegiatan -->
            <div class="mb-6 overflow-x-auto">
                <label class="block text-sm font-medium text-Gray900 mb-2">Foto Laporan Kegiatan <span class="text-AccentRed900">*</span></label>
                <div class="img-laporan-mtr flex space-x-4">
                    {{-- <!-- Image Preview -->
                    <div class="relative">
                        <img src="{{ asset('images/orang1.png') }}" alt="Image" class="w-40 h-40 object-cover rounded-lg">
                        <button class="absolute top-0 right-0 text-white bg-Error600 rounded-lg h-7 w-7 m-2 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>                              
                        </button>
                    </div> --}}
                    <!-- Add More Images Button -->
                    <div id="upload-container">
                        <label class="w-40 h-40 items-center justify-center text-center border-2 border-gray-200 hover:border-red-700 rounded-lg cursor-pointer flex flex-col">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-AccentRed900 mb-1 h-7 w-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                            </svg>
                            <span class="text-AccentRed900 font-semibold text-sm">Klik untuk unggah</span>
                            <input id="file-upload" type="file" name=gambar_laporan[] class="hidden" multiple>
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG up to 10MB</p>
                        </label>
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
    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-hidden="true">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.348 14.849a1 1 0 0 1-1.414 0L10 11.415l-2.934 2.934a1 1 0 1 1-1.414-1.414l2.934-2.934-2.934-2.934a1 1 0 0 1 1.414-1.414L10 8.585l2.934-2.934a1 1 0 0 1 1.414 1.414l-2.934 2.934 2.934 2.934a1 1 0 0 1 0 1.414z" />
        </svg>
    </button>
</div>
@endif
<input type="text" id="statusInput" name="status" class="hidden" >


        <!-- Buttons -->
        <div class="flex justify-end rounded-lg border border-Neutral200 bg-white py-4 px-6 space-x-4">
            <button id="submitButton" type="button" class="px-4 py-2 bg-red-800 text-white rounded-lg text-center flex justify-center items-center">Revisi laporan</button>
        </div>
    </form>
</div>


@endif
<script>
document.getElementById('file-upload').addEventListener('change', function(event) {
    const files = event.target.files; // Get the list of files

    if (files.length > 0) {
        for (let i = 0; i < files.length; i++) { // Loop through each file
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.classList.add('relative');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Uploaded Image';
                img.classList.add('w-40', 'h-40', 'rounded-lg', 'object-cover');

                const deleteButton = document.createElement('button');
                deleteButton.classList.add('absolute', 'top-0', 'right-0', 'text-white', 'bg-Error600', 'rounded-lg', 'h-7', 'w-7', 'm-2', 'flex', 'items-center', 'justify-center');
                deleteButton.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                `;

                // Event listener to delete the image
                deleteButton.addEventListener('click', function() {
                    imgContainer.remove();
                });

                imgContainer.appendChild(img);
                imgContainer.appendChild(deleteButton);

                // Add the new image preview before the upload container
                const uploadContainer = document.getElementById('upload-container');
                uploadContainer.parentNode.insertBefore(imgContainer, uploadContainer);
            };

            reader.readAsDataURL(file); // Read the file and trigger onload
        }
    }
});
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

document.getElementById('submitButton').addEventListener('click', function(event) {
        const statusInput = document.getElementById('statusInput');
        statusInput.value = 'pengajuan'; 

        // Submit form setelah input tersembunyi diisi
        document.getElementById('myForm').submit();
    });
    document.getElementById('submitButtons').addEventListener('click', function(event) {
        const statusInput = document.getElementById('statusInput');
        statusInput.value = 'draf'; 
        document.getElementById('myForm').submit();
    });

</script>


</x-app-layout>
