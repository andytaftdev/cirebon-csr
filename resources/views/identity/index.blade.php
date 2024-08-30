<x-app-layout>
    @if (Auth::user()->level === 'mitra')
    @include('components.navbar-mitra')

    <!-- Bagian Header dengan Icon Home -->
    <div class="flex flex-col w-full md:w-3/4 mx-auto min-h-screen bg-gray-100">
        <!-- Bagian Utama -->
        <div class="flex-grow p-7 mx-auto w-full max-w-screen-2xl h-full">
            <div class="flex items-center space-x-2 mb-4">
                <a href="/dashboard" class="flex items-center text-Ebony300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </a>
                <a class="flex items-center text-Ebony300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
                <span class="text-sm font-medium text-AccentRed900 bg-red-100 px-2 py-1 rounded-md">Profile</span>
            </div>
            <div
                class="flex flex-col md:flex-row justify-between items-start md:items-center mt-10 space-y-4 md:space-y-0">
                <h1 class="text-2xl text-left font-semibold text-Ebony900 my-0">Profil Mitra</h1>
                <div class="flex justify-between gap-3">
                    <a class="px-2" href="{{route('identity.show' , $identity->id)}}">
                        <button
                            class="bg-AccentRed900 hover:bg-red-700 text-white text-sm flex justify-center items-center px-5 py-3 rounded-lg gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                            Ubah Profil
                        </button>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="border-AccentRed900 border bg-white hover:bg-gray-100 text-AccentRed900 text-sm flex justify-center items-center px-5 py-3 rounded-lg gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                                stroke="currentColor" class="w-5 h-5 text-AccentRed900">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>


            </div>
            <div
                class="bg-white flex flex-col md:flex-row justify-between mt-10 p-6 md:p-12 rounded-xl shadow-md mx-auto max-w-full">
                <div class="flex justify-center flex-col items-center w-full md:w-1/2 mb-6 md:mb-0 relative">
                    <div class="w-full h-80 max-w-96 relative">
                        <img class="absolute inset-0 w-full h-full object-cover rounded-xl"
                            src="{{ asset('storage/img/profile/'. $identity->mitra_logo) }}" alt="">
                    </div>
                </div>
                <div class="flex flex-col items-start w-full md:w-1/2">
                    <div class="space-y-1 mb-4">
                        <h2 class="font-semibold text-2xl text-Ebony900">{{$identity->nama_mitra}}</h2>
                        <p class="text-sm text-gray-500">{{$identity->nama_pt}}</p>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-0">
                            <div
                                class="w-10 h-10 bg-AccentRed100 rounded-full flex items-center justify-center mr-4 cursor-pointer">
                                <div class="bg-Red100 w-8 h-8 rounded-full flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-5 text-AccentRed900">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-sm text-Ebony300">{{Auth::user()->email}}</p>
                        </div>
                        <div class="flex items-center space-x-0">
                            <div
                                class="w-10 h-10 bg-AccentRed100 rounded-full flex items-center justify-center mr-4 cursor-pointer">
                                <div class="bg-Red100 w-8 h-8 rounded-full flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="size-5 text-AccentRed900">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-sm text-Ebony300">{{$identity->nomor_hp}}</p>
                        </div>
                        <div class="flex items-center space-x-0">
                            <div
                                class="w-10 h-10 bg-AccentRed100 rounded-full flex items-center justify-center mr-4 cursor-pointer">
                                <div class="bg-Red100 w-8 h-8 rounded-full flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-5 text-AccentRed900">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-sm text-Ebony300">{{$identity->alamat}}</p>
                        </div>
                    </div>
                    <p class="text-sm text-Ebony300 leading-relaxed mt-4">{{$identity->deskripsi}}</p>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <x-footer></x-footer>
    </div>

    @else

    @include('components.navbar-admin')
    <div class="flex flex-col w-full md:w-3/4 mx-auto min-h-screen">

        <div class="flex-grow p-7 mx-auto w-full max-w-screen-2xl h-full">
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
                <span class="text-sm font-medium text-AccentRed900 bg-Red100 px-2 py-1 rounded-md">Profile</span>
            </div>
            <div
                class="flex flex-col md:flex-row justify-between items-start md:items-center mt-10 space-y-4 md:space-y-0">
                <h1 class="text-2xl text-left text-Ebony900 my-0">Profile</h1>
                <div class="flex justify-between gap-2">
                    <a class="px-2" href="{{route('identity.show' , $identity->id)}}">
                        <button
                            class="bg-AccentRed900 hover:bg-red-700 text-white text-sm md:text-base flex justify-center items-center px-5 py-3 rounded-lg gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                            Ubah Profil
                        </button>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="border-AccentRed900 border hover:bg-gray-100 bg-white text-AccentRed900 text-sm md:text-base flex justify-center items-center px-5 py-3 rounded-lg gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                                stroke="currentColor" class="w-5 h-5 text-AccentRed900">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>

                            Logout
                        </button>
                    </form>
                </div>

            </div>
            <div
                class="bg-white flex flex-col md:flex-row justify-center mt-10 p-6 md:p-12 rounded-xl shadow-md mx-auto max-w-full md:max-w-none">
                <div class="flex justify-center flex-col items-center w-full md:w-1/2 mb-6 md:mb-0 relative">
                    <div class="w-full h-60 max-w-60 md:h-80 md:max-w-80 relative">
                        <img class="absolute inset-0 w-full h-full object-cover rounded-xl"
                            src="{{asset('storage/img/profile/'. $identity->mitra_logo)}}" alt="">
                    </div>
                </div>
                <div class="flex justify-center flex-col items-start w-full md:w-1/2 gap-2">
                    <h2 class="font-semibold text-2xl text-Ebony900 text-center md:text-left">{{$identity->nama_mitra}}
                    </h2>
                    <p class="text-Ebony200 text-center md:text-left">{{Auth::user()->email}}</p>
                    <p class="text-Ebony900 text-center md:text-left ">{{$identity->deskripsi}}</p>
                </div>
            </div>

        </div>
        <!-- Footer -->
        <x-footer></x-footer>
    </div>
    @endif

</x-app-layout>
