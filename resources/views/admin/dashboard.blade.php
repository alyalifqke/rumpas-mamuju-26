<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="p-6">

        <h1 class="text-2xl mb-4">
            Selamat datang Admin
        </h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="bg-red-600 text-white px-4 py-2 rounded">
                Logout
            </button>
        </form>

    </div>
</x-app-layout>