<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Data Menu
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

            <div class="flex justify-end mb-4">
                <a href="{{route('menu.create')}}">
                    <x-primary-button class="bg-green-500 hover:bg-green-600 " > + Tambah Menu </x-primary-button>
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table class="w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-orange-500 text-black">
                        <tr>
                            <th class="px-4 py-3 text-center text-gray-900">Nama Menu</th>
                            <th class="px-4 py-3 text-center text-gray-900">Harga</th>
                            <th class="px-4 py-3 text-center text-gray-900">Kategori</th>
                            <th class="px-4 py-3 text-center text-gray-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class='bg-orange-100'>
                        @forelse($menus as $menu)
                        <tr>
                            <td class="px-4 py-3 text-gray-900">{{$menu->namamenu}}</td>
                            <td class="px-4 py-3 text-gray-900">Rp{{ number_format($menu->harga)}}</td>
                            <td class="px-4 py-3 text-gray-900">{{$menu->kategori}}</td>
                            <td class="px-4 py-3 ">
                                <a href="{{route('menu.edit',$menu)}}" class="text-blue-500 hover:text-blue-800">Edit</a>
                                <form action="{{route('menu.destroy',$menu)}}" method="post"
                                onsubmit="return confirm('Yakin hapus menu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-transparent text-red-500 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>

        </div>
        
    </div>
</x-app-layout>