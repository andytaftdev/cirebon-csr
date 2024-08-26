
<x-app-layout>
@include('components.navbar-admin')


<!-- Bagian Header dengan Icon Home -->
<div class="container mx-auto p-5 flex items-center space-x-2">
    <a href="#" class="flex items-center text-Ebony100">
        <ion-icon name="home-outline"></ion-icon>
    </a>
    <ion-icon class="text-Ebony100" name="chevron-forward-outline"></ion-icon>
    <span class="text-sm font-medium px-2 py-1 rounded-md text-Ebony100">Sektor</span>
    <ion-icon class="text-Ebony100" name="chevron-forward-outline"></ion-icon>
    <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Ubah data sektor</span>
</div>

<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-semibold text-gray-800">Ubah data sektor</h1>
</div>

<div class="container mx-auto mt-6 mb-16">
    <!-- Form Ubah Data Sektor -->
    <form id="dataFormSubmit" enctype="multipart/form-data" action="{{route('sektor.update', $sektor->id)}}" method="post">
        @csrf
        @method('PUT')


        
        <div class="bg-white border border-Neutral200 rounded-lg p-6 mb-6" >
            <!-- Foto Thumbnail -->
            <div class="mb-6 font-medium">
                <label class="block mb-2 text-sm font-medium text-gray-700" for="foto-thumbnail">
                    Foto Thumbnail <span class="text-AccentRed900">*</span>
                </label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col w-full h-32 border-2 border-dashed border-gray-300 hover:border-AccentRed900 rounded-lg cursor-pointer">
                        <div class="flex flex-col items-center justify-center pt-7">
                            <ion-icon class="w-8 h-8 text-AccentRed900" name="cloud-download-outline"></ion-icon>
                            <p class="pt-1 text-sm text-gray-500">
                                <span class="text-AccentRed900">Klik untuk unggah</span> atau seret dan lepas kesini
                            </p>
                            <p class="pt-1 text-sm text-gray-400">PNG, JPG up to 10MB</p>
                        </div>
                        <input type="file" name="gambar_sektor" class="opacity-0" />
                    </label>
                </div>
            </div>

            <!-- Nama Sektor -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-700" for="nama-sektor">
                    Nama Sektor <span class="text-AccentRed900">*</span>
                </label>
                <input type="text" name="nama_sektor" class="w-full px-3 py-2 border border-gray-300 rounded-lg" placeholder="Nama Sektor" />
            </div>

            <!-- Deskripsi -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-700" for="deskripsi">
                    Deskripsi
                </label>
                <textarea name="deskripsi_sektor" class="w-full px-3 py-2 border border-gray-300 rounded-lg" rows="3" placeholder="Masukan Deskripsi"></textarea>
            </div>

            <!-- Daftar Program -->
            <div>
                <label class="block mb-2 text-lg font-semibold text-gray-700">
                    Daftar Program
                </label>
                @foreach($programs as $item)
                <input type="hidden" name="program_id[]" value="{{ $item->id }}">
                <!-- Program Item 2 -->
                <div id="program-list">
                    <div class="program-item flex mb-4 space-x-4">
                        <div class="w-1/2">
                            <label class="block mb-2 text-sm font-medium text-gray-700" for="nama-program-1">
                                Nama Program <span class="text-AccentRed900">*</span>
                            </label>
                            <input type="text" name="nama_program[]" value="{{$item->nama_program}}" id="nama-program-1" class="w-full px-3 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama program" />
                        </div>
                        <div class="w-1/2">
                            <label class="block mb-2 text-sm font-medium text-gray-700" for="deskripsi-program-1">
                                Deskripsi Program <span class="text-AccentRed900">*</span>
                            </label>
                            <textarea name="deskripsi[]" id="deskripsi-program-1" class="w-full px-3 py-2 border border-gray-300 rounded-lg" rows="2" placeholder="Masukkan deskripsi program">{{$item->deskripsi}}</textarea>
                        </div>
                        <div class="flex items-start">
                            <button type="button" class="add-program-btn p-4 border border-gray-300 text-black rounded-lg flex items-center justify-center text-center">
                                <ion-icon name="add-outline"></ion-icon>
                            </button>
                        </div>
                        <div id="program-{{ $item->id }}" class="flex items-start">
                                            <button  type="button" class="remove-program-btn p-4 border border-gray-300 text-black rounded-lg flex items-center justify-center text-center" onclick="deleteProgram({{ $item->id }})">
                                                <ion-icon name="trash-outline"></ion-icon>
                                           </button>



                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>

        <!-- Button Actions -->
        <div class="flex justify-end rounded-lg border border-Neutral200 bg-white py-4 px-6 space-x-4">
            <button type="button" class="px-4 py-2 bg-white text-Neutral700 font-medium border border-Neutral300 rounded-lg text-center flex justify-center items-center hover:bg-Neutral200">Simpan Sebagai Draft</button>
            <button type="submit" id="buttonData" class="px-4 py-2 bg-red-800 font-medium text-white rounded-lg text-center flex justify-center items-center">Submit</button>
        </div>
    </form>

</div>




<script>
        function deleteProgram(programId) {
    if (confirm('Apakah Anda yakin ingin menghapus program ini?')) {
        fetch(`/program/delete/${programId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                // Menghapus elemen dari DOM jika penghapusan berhasil
                document.getElementById(`program-${programId}`).remove();
            } else {
                location.reload();
            }
        })

    }
}
document.addEventListener('DOMContentLoaded', function() {
    const programList = document.getElementById('program-list');



        // Function to add a new program item

    function addProgramItem() {
        const newProgramItem = document.createElement('div');
        newProgramItem.classList.add('program-item', 'flex', 'mb-4', 'space-x-4');
        newProgramItem.innerHTML = `
                        <div class="w-1/2">
                            <label class="block mb-2 text-sm font-medium text-gray-700" for="nama-program-1">
                                Nama Program <span class="text-AccentRed900">*</span>
                            </label>
                            <input type="text" name="nama_program[]" id="nama-program-1" class="w-full px-3 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama program" />
                        </div>
                        <div class="w-1/2">
                            <label class="block mb-2 text-sm font-medium text-gray-700" for="deskripsi-program-1">
                                Deskripsi Program <span class="text-AccentRed900">*</span>
                            </label>
                            <textarea name="deskripsi[]" id="deskripsi-program-1" class="w-full px-3 py-2 border border-gray-300 rounded-lg" rows="2" placeholder="Masukkan deskripsi program"></textarea>
                        </div>
                        <div class="flex items-start">
                            <button type="button" class="add-program-btn p-4 border border-gray-300 text-black rounded-lg flex items-center justify-center text-center">
                                <ion-icon name="add-outline"></ion-icon>
                            </button>
                        </div>
                        <div class="flex items-start">
                            <button type="button" class="remove-program-btn p-4 border border-gray-300 text-black rounded-lg flex items-center justify-center text-center">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </div>
        `;
        programList.appendChild(newProgramItem);

        // Add event listeners to new buttons
        newProgramItem.querySelector('.add-program-btn').addEventListener('click', addProgramItem);
        newProgramItem.querySelector('.remove-program-btn').addEventListener('click', function() {
            removeProgramItem(newProgramItem);
        });
        }

        // Function to remove a program item
        function removeProgramItem(programItem) {
            if (programList.children.length > 1) {
                programList.removeChild(programItem);
            } else {

            }
        }

        // Initial event listeners
    document.querySelectorAll('.add-program-btn').forEach(button => {
        button.addEventListener('click', addProgramItem);
    });

    document.querySelectorAll('.remove-program-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            const programItem = event.target.closest('.program-item');
            removeProgramItem(programItem);
        });
    });


});

</script>
</x-app-layout>