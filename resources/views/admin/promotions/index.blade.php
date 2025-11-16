<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Promosi Aktif') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4 flex justify-end">
                        <a href="{{ route('admin.promotions.create') }}" class="
                            inline-flex items-center px-4 py-2 border border-transparent rounded-lg font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-300 
                            bg-gradient-to-r from-orange-500 to-red-600 text-white shadow-md 
                            hover:from-orange-600 hover:to-red-700 hover:shadow-xl transform hover:scale-105
                            focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 active:bg-red-700
                        ">
                            + {{ __('Buat Promosi') }}
                        </a>
                    </div>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mulai</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aktif</th>
                                <th class="px-6 py-3 bg-gray-50">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($promotions as $promotion)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $promotion->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $promotion->start_date->format('d M Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $promotion->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $promotion->is_active ? 'Ya' : 'Tidak' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.promotions.edit', $promotion) }}" class="text-red-600 hover:text-red-800 hover:underline transition duration-150">
                                            Edit
                                        </a>
                                        {{-- Anda bisa menambahkan form DELETE di sini --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $promotions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>