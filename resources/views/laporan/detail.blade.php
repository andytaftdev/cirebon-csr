<x-app-layout>


    @if(Auth::user()->level === 'admin')
    @include('components.navbar-admin')

    @else
    @include('components.navbar-mitra')
    @endif

    <main class="flex-grow"> 
    



    <!-- Bagian Header dengan Icon Home -->
    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto py-5 flex items-center space-x-2">
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
        <a href="{{route('laporan.index')}}">
            <span class="text-sm font-medium px-2 py-1 rounded-md text-Ebony100">Laporan</span>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-Ebony100">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-sm font-medium bg-Red100 px-2 py-1 rounded-md text-AccentRed900">Detail</span>
    </div>

    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto mt-6">
        <!-- Header -->
        <h2 class="text-2xl font-semibold text-Ebony900 mb-6">Detail Laporan</h2>
    </div>

    <div class="container w-full md:w-3/4 mx-auto bg-white p-6 flex flex-col rounded-lg shadow-md mt-6 mb-16">

        @if(Auth::user()->level === 'mitra')
        @if($laporan->status === 'revisi')
        <div class="bg-Warning25 border border-Warning300 rounded-lg text-Warning700 p-4 mb-4">
            <div class="flex flex-row space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-5 w-5 text-Warning600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
                <div class="flex flex-col">
                    <p class="text-sm mb-1">
                        <strong>Laporan perlu direvisi</strong>
                    </p>
                    <p class="text-sm">
                        {{$laporan->message}}
                    </p>
                </div>
            </div>
        </div>
        @elseif ($laporan->status === 'tolak')
        <div class="bg-AccentRed100 border border-AccentRed300 rounded-lg text-AccentRed300 p-4 mb-4">
            <div class="flex flex-row space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-5 w-5 text-Warning600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
                <div class="flex flex-col">
                    <p class="text-sm mb-1">
                        <strong>Laporan ditolak</strong>
                    </p>
                    <p class="text-sm">
                        {{$laporan->message}}

                    </p>
                </div>
            </div>
        </div>
        @endif
        @endif
        <!-- Tags -->
        <div class="flex space-x-4 mb-4">
            @if($laporan->status === 'terima')
            <span class="bg-Success50 text-Success700 py-1 px-3 rounded-full font-medium text-xs">Diterima</span>
            @elseif($laporan->status === 'draf')
            <span class="bg-Gray100 text-Gray700 py-1 px-3 rounded-full font-medium text-xs">Draf</span>
            @elseif($laporan->status === 'revisi')
            <span class="bg-Warning50 text-Warning700 py-1 px-3 rounded-full font-medium text-xs">Revisi</span>
            @elseif($laporan->status === 'pengajuan')
            <span class="bg-Blue50 text-Blue500 py-1 px-3 rounded-full font-medium text-xs">Pengajuan</span>
            @elseif($laporan->status === 'tolak')
            <span class="bg-AccentRed100 text-AccentRed300 text- py-1 px-3 rounded-full font-medium text-xs">tolak</span>
            @endif

            <span
                class="inline-block bg-Gray100 text-gray-700 text-sm px-3 py-1 rounded-full font-medium">{{$sektor->nama_sektor}}</span>
            <span
                class="inline-block bg-Gray100 text-gray-700 text-sm px-3 py-1 rounded-full font-medium">{{$program->nama_program}}</span>
        </div>

        <div class="flex flex-row">
            <div class="sm:bg-Red100 bg-opacity-0 pr-4 pt-1 rounded-full">
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
            <div class="flex flex-col">
                <h3 class="text-xl font-semibold text-Gray900 mb-1">{{$laporan->judul}}</h3>
                <p class="text-sm text-Gray900">{{$laporan->tanggal}} {{$laporan->bulan}} {{$laporan->tahun}}</p>
            </div>
        </div>

        <div class="bg-[#EAECF0] w-full h-[2px] my-5 rounded-full"></div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            @foreach($imgName as $item)
            <img src="{{ asset('storage/img/laporan/'. $item) }}" src="#" alt="">
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 mb-6">
            <div class="p-4 space-y-2 border-l-4 border-l-AccentRed900 bg-AccentRed100 rounded-lg">
                <h4 class="text-sm font-normal text-Gray900">Realisasi</h4>
                <p class="text-lg font-semibold text-Gray900">Rp.{{number_format($laporan->realisasi, 0, ',', ',')}}</p>
            </div>
            <div class="p-4 space-y-2 border-l-4 border-l-AccentRed900 bg-AccentRed100 rounded-lg">
                <h4 class="text-sm font-normal text-Gray900">Nama Proyek</h4>
                <p class="text-base font-semibold text-gray-800">{{$laporan->proyek->nama_proyek}}</p>
            </div>
            <div class="p-4 space-y-2 border-l-4 border-l-AccentRed900 bg-AccentRed100 rounded-lg">
                <h4 class="text-sm font-normal text-Gray900">Kecamatan</h4>
                <p class="text-md font-semibold text-Gray900">{{$laporan->proyek->kecamatan}}</p>
            </div>
            <div class="p-4 space-y-2 border-l-4 border-l-AccentRed900 bg-AccentRed100 rounded-lg">
                <h4 class="text-sm font-normal text-Gray900">Tanggal Realisasi</h4>
                <p class="text-md font-semibold text-Gray900">{{$laporan->tanggal}} {{$laporan->bulan}}
                    {{$laporan->tahun}}</p>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-semibold text-Gray900 mb-2">Rincian Laporan</h2>
            <p class="text-Gray900 leading-relaxed mb-2">{{$laporan->deskripsi}}</p>
        </div>
    </div>

    @if(Auth::user()->level === 'mitra')
    @if($laporan->status === 'revisi')
    <div class="container w-full md:w-3/4 px-6 md:px-0 mx-auto bg-white p-4 flex shadow-md justify-center items-center space-x-4 mb-16 rounded-lg">
        <form method="POST" action="{{route('laporan.destroy', $laporan->id)}}">
            @csrf
            {{method_field('DELETE')}}
            <button type="submit"
                class="px-4 py-2 bg-transparent border border-Neutral300 hover:bg-gray-100 bg-white text-Neutral700 rounded-md flex justify-center items-center gap-2 text-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>     
                Hapus Laporan             
            </button>

        </form>
        <a href="{{route('laporan.edit', $laporan->id)}}"><button
                class="px-4 py-2 bg-AccentRed900 hover:bg-red-700 text-white rounded-md flex justify-center items-center gap-2 text-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>                  
                Revisi Laporan</button></a>
    </div>
    @elseif($laporan->status === 'draf')
    <div class="container mx-auto bg-white p-5 flex shadow-md justify-center items-center space-x-4 mb-16 rounded-lg">

        <a href="{{route('laporan.edit', $laporan->id)}}"><button
                class="px-4 py-2 bg-AccentRed900 hover:bg-red-700 text-white rounded-md">Edit
                Laporan</button></a>
    </div>
    @endif
    @else

    @if($laporan->status === 'pengajuan')
    <div
        class="container w-full md:w-3/4 mx-auto bg-white p-4 flex flex-row justify-center items-center space-x-6 rounded-lg shadow-md mb-16">
        <button data-modal-target="default-modal1" data-modal-toggle="default-modal1"
            class="w-full md:w-1/6 text-nowrap flex justify-center items-center gap-2 p-2 bg-red-100 hover:bg-red-200 text-AccentRed900 border border-AccentRed900 rounded-lg"
            type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>              
            Tolak</button>
        <button data-modal-target="default-modal2" data-modal-toggle="default-modal2"
            class="w-full md:w-1/6 text-nowrap flex justify-center items-center gap-2 p-2 bg-[#F4F7FB] hover:bg-blue-100 text-Blue700 border border-Blue700 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
              </svg>
              Revisi</button>
        <button data-modal-target="default-modal3" data-modal-toggle="default-modal3"
            class="w-full md:w-1/6 text-nowrap flex justify-center items-center gap-2 p-2 bg-Blue700 text-white rounded-lg hover:bg-Blue600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
              </svg>
              Terima</button>
    </div>

    <!-- Main modal -->
    <div id="default-modal1" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
        <div class="relative p-4 w-11/12 max-w-xl flex flex-col items-center justify-center">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex flex-col p-4 md:p-5 rounded-t  space-y-6">
                    <div class="flex flex-col">
                        <h3 class="text-lg font-bold text-gray-900  mb-2">
                            Tolak Laporan?
                        </h3>

                        <h3 class="text-sm text-gray-600 ">
                            Laporan akan ditolak dan pihak mitra harus mengirimkan laporan <br>kembali
                        </h3>
                    </div>
                    <form method="POST" action="{{route('laporan.tolak', $laporan->id)}}">
                        @csrf
                        @method('PUT')



                        <div class="space-y-2">
                            <p class="text-base text-[#111111] font-semibold">Alasan</p>
                            <textarea name="message" id="alasan-tolak"
                                class="pl-4 pt-2 rounded-lg w-full h-[130px] border-gray-300"
                                placeholder="Masukkan Alasan"></textarea>
                        </div>

                        <div class="flex items-center border-Neutral300 w-full mt-3">
                            <button data-modal-hide="default-modal1" type="button"
                                class="text-[#111111] bg-white hover:bg-gray-100 border border-Neutral300 rounded-lg text-sm px-5 py-2.5 text-center w-1/2">Batal</button>
                            <button data-modal-hide="default-modal1" type="submit"
                                class="bg-red-900 hover:bg-red-700 text-white py-2.5 px-5 ms-3 text-sm rounded-lg w-1/2">Tolak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="default-modal2" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
        <div class="relative p-4 w-11/12 max-w-xl flex flex-col items-center justify-center">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex flex-col p-4 md:p-5 rounded-t  space-y-6">
                    <div class="flex flex-col">
                        <h3 class="text-lg font-bold text-gray-900  mb-2">
                            Revisi
                        </h3>

                        <h3 class="text-sm text-gray-600 ">
                            Laporan akan diberikan kepada mitra untuk merevisi beberapa hal yang tidak sesuai
                        </h3>
                    </div>
                    <form method="POST" action="{{route('laporan.revisi', $laporan->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-2">
                            <p class="text-base text-[#111111] font-semibold">Alasan</p>
                            <textarea name="message" id="alasan-tolak"
                                class="pl-4 pt-2 rounded-lg w-full h-[130px] border-gray-300"
                                placeholder="Masukkan Alasan Revisi"></textarea>
                        </div>

                        <div class="flex items-center border-Neutral300 w-full mt-3">
                            <button data-modal-hide="default-modal2" type="button"
                                class="text-[#111111] bg-white hover:bg-gray-100 border border-Neutral300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2">Batal</button>
                            <button data-modal-hide="default-modal2" type="submit"
                                class="bg-AccentRed900 hover:bg-red-700 text-white py-2.5 px-5 ms-3 text-sm font-medium rounded-lg w-1/2">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="default-modal3" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
        <div class="relative p-4 w-11/12 max-w-lg flex flex-col items-center justify-center">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <form method="POST" action="{{route('laporan.terima', $laporan->id)}}">
                    @csrf
                    @method('PUT')


                    <div class="flex flex-col p-4 md:p-5 rounded-t  space-y-6">
                        <div class="flex flex-col">
                            <h3 class="text-lg font-bold text-gray-900  mb-2">
                                Terima Laporan?
                            </h3>

                            <h3 class="text-sm text-gray-600 ">
                                Laporan akan diterima dan data portal CSR Kabupaten Cirebon akan ter-update secara
                                otomatis
                            </h3>
                        </div>

                        <div class="flex items-center border-Neutral300 w-full mt-3">
                            <button data-modal-hide="default-modal3" type="button"
                                class="text-[#111111] border border-Neutral300 bg-white hover:bg-gray-100 rounded-lg text-sm px-5 py-2.5 text-center w-1/2">Batal</button>
                            <button data-modal-hide="default-modal3" type="submit"
                                class="bg-AccentRed900 text-white hover:bg-red-700 py-2.5 px-5 ms-3 text-sm rounded-lg w-1/2">Terima</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    @else
    <div class="container w-full md:px-0 px-6 md:w-3/4 mx-auto bg-white p-4 flex shadow-md justify-center items-center space-x-4 mb-16 rounded-lg">
        <form method="POST" action="{{route('laporan.destroy', $laporan->id)}}">
            @csrf
            {{method_field('DELETE')}}
            <button type="submit"
                class="px-4 py-2 bg-AccentRed900 hover:bg-red-700 text-white rounded-md flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>                  
                Hapus Laporan</button>

        </form>
    </div>
    @endif

    @endif
    </main>

<x-footer-admin></x-footer-admin>

</x-app-layout>
