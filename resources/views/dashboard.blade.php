<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Utama Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600 mb-8">
                        Gunakan tautan di bawah ini untuk mengelola Produk dan Promosi di Supabase Anda.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        {{-- CARD: KELOLA PRODUK --}}
                        <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-6 shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-[1.02]">
                            <h4 class="text-xl font-semibold text-indigo-800 mb-4">Pengelolaan Produk</h4>
                            
                            {{-- Tombol/Tautan Aksi --}}
                            <div class="space-y-3">
                                <a href="{{ route('admin.products.create') }}" class="
                                    flex items-center justify-center w-full px-4 py-2 border border-transparent rounded-lg font-medium text-white shadow-md transition duration-300
                                    bg-gradient-to-r from-green-500 to-teal-500 hover:from-green-600 hover:to-teal-600 hover:shadow-lg
                                ">
                                    + Tambah Produk Baru
                                </a>
                                <a href="{{ route('admin.products.index') }}" class="
                                    flex items-center justify-center w-full px-4 py-2 border border-indigo-500 rounded-lg font-medium text-indigo-700 bg-white shadow-sm transition duration-150
                                    hover:bg-indigo-50 hover:shadow-md
                                ">
                                    Lihat Semua Produk
                                </a>
                            </div>
                        </div>

                        {{-- CARD: KELOLA PROMOSI --}}
                        <div class="bg-red-50 border border-red-200 rounded-xl p-6 shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-[1.02]">
                            <h4 class="text-xl font-semibold text-red-800 mb-4">Pengelolaan Promosi</h4>
                            
                            {{-- Tombol/Tautan Aksi --}}
                            <div class="space-y-3">
                                <a href="{{ route('admin.promotions.create') }}" class="
                                    flex items-center justify-center w-full px-4 py-2 border border-transparent rounded-lg font-medium text-white shadow-md transition duration-300
                                    bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 hover:shadow-lg
                                ">
                                    + Buat Promosi Baru
                                </a>
                                <a href="{{ route('admin.promotions.index') }}" class="
                                    flex items-center justify-center w-full px-4 py-2 border border-red-500 rounded-lg font-medium text-red-700 bg-white shadow-sm transition duration-150
                                    hover:bg-red-50 hover:shadow-md
                                ">
                                    Lihat Semua Promosi
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>