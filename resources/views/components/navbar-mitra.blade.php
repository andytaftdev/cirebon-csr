{{-- Navbar Section --}}
<div class="w-full bg-white">
    <div class="container mx-auto flex justify-between items-center p-4 bg-white">
        <div class="flex items-center">
            <img src="{{ asset('images/csr-logo.png') }}" alt="Logo" class="h-10">
        </div>
        <div class="flex items-center">
            <div class="text-right mr-4">
                <p class="font-medium text-Ebony900">{{Auth::user()->name}}</p>
                <p class="text-sm text-Ebony100">Mitra</p>
            </div>
            <a href="{{route('identity.index')}}">
            <div class="relative">
                <img src="{{ asset('storage/img/profile/'. $identity->mitra_logo) }}" alt="User Avatar" class="h-9 w-9 rounded-full border border-Neutral300">
            </div>
            </a>
            <div class="relative ml-3">
                <span class="relative inline-block cursor-pointer" id="notification-icon">
                    <!-- Heroicons Notification Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 mt-1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>                                        
                    <span class="absolute bottom-4 left-3 inline-block w-4 h-4 text-[11px] pl-0.5 font-bold text-white bg-AccentRed900 rounded-full">
                        69
                    </span>
                </span>
    
                <!-- Dropdown Notifikasi -->
                <div id="notification-dropdown" class="absolute right-0 mt-2 w-96 bg-white border border-gray-300 rounded-lg shadow-lg hidden z-50">
                    <div class="p-5 flex justify-between items-center">
                        <h2 class="font-bold text-lg text-Ebony900">Notifikasi</h2>
                        <form action="{{route('notification.update', Auth::user()->id)}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <input type="hidden" name="current_url" value="{{ url()->current() }}">
                            <input type="number" name="terlihat" id="terlihat" value="1" hidden required>
                        <button id="close-notifications" type="submit" class="text-Ebony900 hover:text-Ebony300">
                            <!-- Heroicons Close Icon -->

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>                                                      
                        </button>
                        </form>
                        
                    </div>
                    <div class="p-5 max-h-96 overflow-y-auto scrollbar-hide space-y-3">

                    @foreach ($notification as $item)
                    @if($item->access === 'admin')

                    @else
                       @if ($item->terlihat === 1 )
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
                       <div class="inline-block p-1.5 px-2.5 rounded-full bg-Warning50">
                                <p class="text-xs font-semibold text-Warning700">
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
                       <p class="text-sm font-semibold my-1 text-Ebony900">{{$item->judul}}</p>
                       <p class="text-sm font-medium text-Ebony200">{{$item->deskripsi}}</p>
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
                         <div class="inline-block p-1.5 px-2.5 rounded-full bg-Warning50">
                                  <p class="text-xs font-semibold text-Warning700">
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
                         <p class="text-sm font-semibold my-1 text-Ebony900"> {{$item->judul}}</p>
                         <p class="text-sm font-medium text-Ebony200"> {{$item->deskripsi}}</p>
                          </div>
                        @endif
                        @endif
                        @endforeach
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Navbar Section --}}

<!-- JavaScript untuk men-toggle notifikasi -->
<script>
    document.getElementById('notification-icon').addEventListener('click', function () {
        var dropdown = document.getElementById('notification-dropdown');
        dropdown.classList.toggle('hidden');
    });

    document.getElementById('close-notifications').addEventListener('click', function () {
        var dropdown = document.getElementById('notification-dropdown');
        dropdown.classList.add('hidden');
    });

    // Untuk menutup dropdown ketika klik di luar area dropdown
    document.addEventListener('click', function (event) {
        var dropdown = document.getElementById('notification-dropdown');
        var notificationIcon = document.getElementById('notification-icon');
        if (!notificationIcon.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>