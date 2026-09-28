<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Data Menu
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{route('menu.update', $menu)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="namamenu" value="Nama Menu" />
                        <x-text-input id="namamenu" name="namamenu" type="text" class="mt-1 block w-full" :value="old('namamenu', $menu->namamenu)" autofocus />
                        <x-input-error :messages="$errors->get('namamenu')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="harga" value="Harga" />
                        <x-text-input id="harga" name="harga" type="text" class="mt-1 block w-full" :value="old('harga', $menu->harga)" />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="kategori" value="Kategori" />
                        <select name="kategori" id="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="makanan" @selected($menu->kategori == 'makanan')>Makanan</option>
                            <option value="minuman" @selected($menu->kategori == 'minuman')>Minuman</option>
                            <option value="desert" @selected($menu->kategori == 'desert')>Desert</option>
                        </select>
                        <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                    </div>

                    <div class="flex justify-end gap-4 mt-4">
                        <a href="{{route('menu.index')}}">
                            <x-secondary-button class="bg-red-500 text-white hover:bg-red-600">Kembali</x-secondary-button>
                        </a>
                        <x-primary-button class="bg-green-500 text-white hover:bg-green-600">Simpan</x-primary-button>
                    </div>
                </form>
            </div>

        </div>
        
    </div>
</x-app-layout>