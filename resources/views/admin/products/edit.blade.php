<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}: {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <h3 class="text-lg font-bold text-gray-900 mb-6">{{ __('Form Edit Produk') }}</h3>

                <!-- 
                    ACTION: Mengarah ke route update, menggunakan metode POST di HTML 
                    tetapi diubah menjadi PUT oleh @method('PUT').
                -->
                <form method="POST" action="{{ route('admin.products.update', $product) }}">
                    @csrf 
                    @method('PUT') {{-- Wajib untuk operasi UPDATE --}}
                    
                    <!-- Nama Produk -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Nama Produk')" />
                        {{-- Menggunakan $product->name untuk memuat data lama --}}
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $product->name)" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Harga -->
                    <div class="mb-4">
                        <x-input-label for="price" :value="__('Harga (Rp)')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $product->price)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('price')" />
                    </div>

                    <!-- Kategori (Dropdown) -->
                    <div class="mb-4">
                        <x-input-label for="category" :value="__('Kategori')" />
                        <select id="category" name="category" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @php $currentCategory = old('category', $product->category); @endphp
                            <option value="Pashmina" {{ $currentCategory == 'Pashmina' ? 'selected' : '' }}>Pashmina</option>
                            <option value="Jilbab Segi Empat" {{ $currentCategory == 'Jilbab Segi Empat' ? 'selected' : '' }}>Jilbab Segi Empat</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('category')" />
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Deskripsi Detail')" />
                        <textarea id="description" name="description" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        {{-- Tombol Update (Menggunakan Style Menarik) --}}
                        <button type="submit" class="
                            inline-flex items-center px-4 py-2 border border-transparent rounded-lg font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-300 
                            bg-gradient-to-r from-teal-600 to-cyan-600 text-white shadow-md 
                            hover:from-teal-700 hover:to-cyan-700 hover:shadow-xl transform hover:scale-105 
                            focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 active:bg-teal-900
                        ">
                            {{ __('Simpan Perubahan') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>