{{-- Navbar Section --}}
<div class="w-full bg-white">
    <div class="md:w-full xl:w-3/4 mx-auto flex justify-between items-center p-4 bg-white">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="{{ asset('images/csr-logo.png') }}" alt="Logo" class="h-10 sm:h-8">
        </div>

        <!-- Navbar Links (Hidden on Small Screens) -->
        <div class="hidden lg:flex items-center space-x-8">
            <a class="text-Ebony900 hover:text-AccentRed900 hover:font-semibold "
                href="/dashboard">Dashboard</a>
            <a class="text-Ebony900 hover:text-AccentRed900 hover:font-semibold"
                href="{{route('kegiatan.index')}}">Kegiatan</a>
            <a class="text-Ebony900 hover:text-AccentRed900 hover:font-semibold"
                href="{{route('proyek.index')}}">Proyek</a>
            <a class="text-Ebony900 hover:text-AccentRed900 hover:font-semibold"
                href="{{route('sektor.index')}}">Sektor</a>
            <a class="text-Ebony900 hover:text-AccentRed900 hover:font-semibold"
                href="{{route('laporan.index')}}">Laporan</a>
            <a class="text-Ebony900 hover:text-AccentRed900 hover:font-semibold"
                href="/mitra">Mitra</a>
        </div>

        <div class="hidden md:flex items-center space-x-4">
            <div class="text-right">
                <p class="font-medium text-Ebony900">{{$identity->nama_mitra}}</p>
                <p class="text-sm text-Ebony100">Admin</p>
            </div>
            <div class="relative">
            <a href="{{route('identity.index')}}">
                <img src="{{ asset('storage/img/profile/'. $identity->mitra_logo) }}" alt="User Avatar"
                    class="h-9 w-9 rounded-full border border-Neutral300">
            </a>
            </div>
            <div class="relative ml-3">
                <button id="notification-icon" class="relative">
                    <!-- Heroicons Notification Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-7 mt-1.5 text-Ebony900 hover:text-Ebony200">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                    @if ($jumlahNotifikasi == 0)
                    @else
                    <span
                    class="absolute bottom-4 left-3 inline-block w-4 h-4 text-[11px] pl-0.5 font-bold text-white bg-AccentRed900 rounded-full">{{ $jumlahNotifikasi }}</span>
                    @endif
                   
                </button>

                <!-- Dropdown Notifikasi -->
                <div id="notification-dropdown"
                    class="absolute right-0 mt-2 w-96 bg-white border border-gray-300 rounded-lg shadow-lg hidden z-50">
                    <div class="p-5 flex justify-between items-center">
                        <h2 class="font-bold text-lg text-Ebony900">Notifikasi</h2>
                        <form action="{{route('notification.update', Auth::user()->id)}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <input type="hidden" name="current_url" value="{{ url()->current() }}">
                            <input type="number" name="terlihat_admin" id="terlihat" value="1" hidden required>
                        <button id="close-notifications" class="text-Ebony900 hover:text-Ebony300">
                            <!-- Heroicons Close Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                        </form>
                    </div>
                    <div class="p-5 max-h-96 overflow-y-auto scrollbar-hide space-y-3">
                        @foreach ($notification as $item)
                    @if ($item->status === 'revisi')

                    @else
                       @if ($item->terlihat_admin === 1 )
                 <div class="p-3 bg-white border border-Neutral100 rounded-lg" data-id="{{ $item->id }}">
                    @if ($item->level === 'mitra')
                          <div class="inline-block p-1.5 px-2.5 rounded-full bg-Blue50">
                                <p class="text-xs font-semibold text-Blue500">
                                  Mitra baru! 
                                </p>
                            </div>
                       @elseif ($item->level === 'laporan')
                       @if ($item->status === 'baru')
                       <div class="inline-block p-1.5 px-2.5 rounded-full bg-Blue50">
                                <p class="text-xs font-semibold text-Blue500">
                                  Laporan baru! 
                                </p>
                            </div>
                            @elseif ($item->status === 'tolak')
                       <div class="inline-block p-1.5 px-2.5 rounded-full bg-AccentRed100">
                                <p class="text-xs font-semibold text-AccentRed900">
                                  Laporan Ditolak! 
                                </p>
                            </div>
                            @elseif ($item->status === 'revisi')
                       <div class="inline-block p-1.5 px-2.5 rounded-full bg-Blue50">
                                <p class="text-xs font-semibold text-Blue500">
                                  Laporan perlu Direvisi! 
                                </p>
                            </div>
                            @elseif ($item->status === 'terima')
                            <div class="inline-block p-1.5 px-2.5 rounded-full bg-Success50">
                                  <p class="text-xs font-semibold text-Success700">
                                    Laporan Diterima! 
                                  </p>
                              </div>
                         @endif
                       @endif
                       <p class="text-sm font-semibold my-1 text-Ebony900">Mitra {{$item->judul}}</p>
                       <p class="text-sm font-medium text-Ebony200">PT Mitra {{$item->deskripsi}}</p>
                        </div>
                        @else 
                        <div class="p-3 bg-AccentRed100 border border-Neutral100 rounded-lg notification-item" data-id="{{ $item->id }}">
                      @if ($item->level === 'mitra')
                            <div class="inline-block p-1.5 px-2.5 rounded-full bg-Blue50">
                                  <p class="text-xs font-semibold text-Blue500">
                                    Mitra baru! 
                                  </p>
                              </div>
                         @elseif ($item->level === 'laporan')
                         @if ($item->status === 'baru')
                         <div class="inline-block p-1.5 px-2.5 rounded-full bg-Blue50">
                                  <p class="text-xs font-semibold text-Blue500">
                                    Laporan baru! 
                                  </p>
                              </div>
                              @elseif ($item->status === 'tolak')
                         <div class="inline-block p-1.5 px-2.5 rounded-full bg-white">
                                  <p class="text-xs font-semibold text-AccentRed900">
                                    Laporan Ditolak!
                                  </p>
                              </div>
                              @elseif ($item->status === 'revisi')

                              @elseif ($item->status === 'terima')
                              <div class="inline-block p-1.5 px-2.5 rounded-full bg-Success50">
                                  <p class="text-xs font-semibold text-Success700">
                                    Laporan Diterima! 
                                  </p>
                              </div>
                           @endif
                         @endif
                              <p class="text-sm font-semibold my-1 text-Ebony900">Mitra {{$item->judul}}</p>
                              <p class="text-sm font-medium text-Ebony200">PT Mitra {{$item->deskripsi}}</p>
                          </div>
                        @endif
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Button and Icons -->
        <div class="md:hidden flex items-center space-x-4">
        <div class="relative">
            <a href="{{route('identity.index')}}">
                <img src="{{ asset('storage/img/profile/'. $identity->mitra_logo) }}" alt="User Avatar"
                    class="h-9 w-9 rounded-full border border-Neutral300">
            </a>
            </div>
            <button id="notification-icon-mobile" class="relative">
                <!-- Heroicons Notification Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
                <span
                    class="absolute bottom-4 left-3 inline-block w-4 h-4 text-[11px] pl-0.5 font-bold text-white bg-AccentRed900 rounded-full">69</span>
            </button>
            <button id="menu-toggle" class="outline-none mobile-menu-button">
                <!-- Hamburger Icon -->
                <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!-- Close Icon -->
                <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div class="hidden mobile-menu md:hidden border-t border-Neutral300">
        <a href="#"
            class="block text-sm px-7 py-4 text-AccentRed900 underline underline-AccentRed900 underline-offset-8 hover:bg-gray-200 font-semibold">Dashboard</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Kegiatan</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Proyek</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Sektor</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Laporan</a>
        <a href="#" class="block text-sm px-7 py-4 text-Ebony900 hover:bg-gray-200">Mitra</a>
    </div>

    <!-- Mobile Notification Dropdown -->
    <div id="notification-dropdown-mobile"
        class="absolute right-0 mt-2 w-96 bg-white border border-gray-300 rounded-lg shadow-lg hidden z-50">
        <div class="p-5 flex justify-between items-center">
            <h2 class="font-bold text-lg text-Ebony900">Notifikasi</h2>
            <form action="{{route('notification.update', Auth::user()->id)}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <input type="hidden" name="current_url" value="{{ url()->current() }}">
                            <input type="number" name="terlihat_admin" id="terlihat" value="1" hidden required>
            <button id="close-notifications-mobile" class="text-Ebony900 hover:text-Ebony300">
                <!-- Heroicons Close Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
           </form>
        </div>
        <div class="p-5 max-h-96 overflow-y-auto scrollbar-hide space-y-3">
        
            @foreach ($notification as $item)
                    @if ($item->status === 'revisi')

                    @else
                       @if ($item->terlihat_admin === 1 )
                 <div class="p-3 bg-white border border-Neutral100 rounded-lg" data-id="{{ $item->id }}">
                    @if ($item->level === 'mitra')
                          <div class="inline-block p-1.5 px-2.5 rounded-full bg-Blue50">
                                <p class="text-xs font-semibold text-Blue500">
                                  Mitra baru! 
                                </p>
                            </div>
                       @elseif ($item->level === 'laporan')
                       @if ($item->status === 'baru')
                       <div class="inline-block p-1.5 px-2.5 rounded-full bg-Blue50">
                                <p class="text-xs font-semibold text-Blue500">
                                  Laporan baru! 
                                </p>
                            </div>
                            @elseif ($item->status === 'tolak')
                       <div class="inline-block p-1.5 px-2.5 rounded-full bg-AccentRed100">
                                <p class="text-xs font-semibold text-AccentRed900">
                                  Laporan Ditolak! 
                                </p>
                            </div>
                            @elseif ($item->status === 'revisi')
                       <div class="inline-block p-1.5 px-2.5 rounded-full bg-Blue50">
                                <p class="text-xs font-semibold text-Blue500">
                                  Laporan perlu Direvisi! 
                                </p>
                            </div>
                            @elseif ($item->status === 'terima')
                            <div class="inline-block p-1.5 px-2.5 rounded-full bg-Success50">
                                  <p class="text-xs font-semibold text-Success700">
                                    Laporan Diterima! 
                                  </p>
                              </div>
                         @endif
                       @endif
                       <p class="text-sm font-semibold my-1 text-Ebony900">Mitra {{$item->judul}}</p>
                       <p class="text-sm font-medium text-Ebony200">PT Mitra {{$item->deskripsi}}</p>
                        </div>
                        @else 
                        <div class="p-3 bg-AccentRed100 border border-Neutral100 rounded-lg notification-item" data-id="{{ $item->id }}">
                      @if ($item->level === 'mitra')
                            <div class="inline-block p-1.5 px-2.5 rounded-full bg-Blue50">
                                  <p class="text-xs font-semibold text-Blue500">
                                    Mitra baru! 
                                  </p>
                              </div>
                         @elseif ($item->level === 'laporan')
                         @if ($item->status === 'baru')
                         <div class="inline-block p-1.5 px-2.5 rounded-full bg-Blue50">
                                  <p class="text-xs font-semibold text-Blue500">
                                    Laporan baru! 
                                  </p>
                              </div>
                              @elseif ($item->status === 'tolak')
                         <div class="inline-block p-1.5 px-2.5 rounded-full bg-white">
                                  <p class="text-xs font-semibold text-AccentRed900">
                                    Laporan Ditolak!
                                  </p>
                              </div>
                              @elseif ($item->status === 'revisi')

                              @elseif ($item->status === 'terima')
                              <div class="inline-block p-1.5 px-2.5 rounded-full bg-Success50">
                                  <p class="text-xs font-semibold text-Success700">
                                    Laporan Diterima! 
                                  </p>
                              </div>
                           @endif
                         @endif
                              <p class="text-sm font-semibold my-1 text-Ebony900">Mitra {{$item->judul}}</p>
                              <p class="text-sm font-medium text-Ebony200">PT Mitra {{$item->deskripsi}}</p>
                          </div>
                        @endif
                        @endif
                        @endforeach
        </div>
    </div>
</div>
{{-- End Navbar Section --}}

<!-- JavaScript for toggling the mobile menu and notifications -->
<script>
    // Toggle Mobile Menu
    document.getElementById("menu-toggle").addEventListener("click", function () {
        var menu = document.querySelector(".mobile-menu");
        var hamburgerIcon = document.getElementById("hamburger-icon");
        var closeIcon = document.getElementById("close-icon");

        // Toggle mobile menu visibility
        menu.classList.toggle("hidden");

        // Toggle icons
        hamburgerIcon.classList.toggle("hidden");
        closeIcon.classList.toggle("hidden");
    });

    // Toggle Notification Dropdown (Desktop)
    document.getElementById("notification-icon").addEventListener("click", function () {
        var dropdown = document.getElementById("notification-dropdown");
        dropdown.classList.toggle("hidden");
    });

    // Close Notification Dropdown (Desktop)
    document.getElementById("close-notifications").addEventListener("click", function () {
        var dropdown = document.getElementById("notification-dropdown");
        dropdown.classList.add("hidden");
    });

    // Toggle Notification Dropdown (Mobile)
    document.getElementById("notification-icon-mobile").addEventListener("click", function () {
        var dropdown = document.getElementById("notification-dropdown-mobile");
        dropdown.classList.toggle("hidden");
    });

    // Close Notification Dropdown (Mobile)
    document.getElementById("close-notifications-mobile").addEventListener("click", function () {
        var dropdown = document.getElementById("notification-dropdown-mobile");
        dropdown.classList.add("hidden");
    });

</script>