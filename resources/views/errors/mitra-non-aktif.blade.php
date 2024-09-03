<x-app-layout>

    <div class="flex flex-col justify-center items-center min-h-screen bg-white">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-AccentRed900 mb-4">Non-Aktif!</h1>
            <p class="text-xl text-Ebony900 mb-6">Akun anda telah di non-aktifkan oleh Admin.</p>
            <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-AccentRed900 text-white rounded-lg">
                {{$identity->message_non_aktif}}
            </a>
        </div>
    </div>

    <x-footer></x-footer>
</x-app-layout>
