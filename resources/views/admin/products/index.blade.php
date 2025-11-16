<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4 flex justify-end">
                        {{-- Tombol Tambah Produk (Menggunakan Style Baru) --}}
                        <a href="{{ route('admin.products.create') }}" class="
                            inline-flex items-center px-4 py-2 border border-transparent rounded-lg font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-300 
                            bg-gradient-to-r from-green-500 to-blue-500 text-white shadow-md 
                            hover:from-green-600 hover:to-blue-600 hover:shadow-xl transform hover:scale-105
                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 active:bg-green-700
                        ">
                            + {{ __('Tambah Produk') }}
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-3 bg-gray-50">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            {{-- Looping data produk --}}
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{-- Tautan Edit dengan Style Hover --}}
                                        <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-blue-800 hover:underline transition duration-150">
                                            Edit
                                        </a>
                                        {{-- Anda bisa menambahkan form DELETE di sini --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>