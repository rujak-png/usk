<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} - {{ auth()->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                
                @role('admin')
                <div class="bg-orange-300 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <p class="text-sm">Total Menu</p>
                    <p class="text-2xl font-bold">{{ $totalMenu }}</p>
                </div>
                <div class="bg-orange-300 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <p class="text-sm">Total Meja</p>
                    <p class="text-2xl font-bold">{{ $totalMeja }}</p>
                </div>
                <div class="bg-orange-300 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <p class="text-sm">Total User</p>
                    <p class="text-2xl font-bold">{{ $totalUser }}</p>
                </div>
                @endrole

            </div>
            </div>

        </div>
        
    </div>
</x-app-layout>
