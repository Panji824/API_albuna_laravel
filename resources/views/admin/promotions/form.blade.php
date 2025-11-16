<x-app-layout>
    {{-- $promotion adalah variabel opsional untuk mode EDIT --}}
    @php
        $isEdit = isset($promotion);
        $title = $isEdit ? 'Edit Promosi: ' . $promotion->title : 'Buat Promosi Baru';
        $routeAction = $isEdit ? route('admin.promotions.update', $promotion) : route('admin.promotions.store');
    @endphp

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <h3 class="text-lg font-bold text-gray-900 mb-6">{{ $title }}</h3>

                <form method="POST" action="{{ $routeAction }}">
                    @csrf 
                    @if($isEdit) @method('PUT') @endif {{-- Wajib untuk mode Edit --}}
                    
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Judul Promo')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $promotion->title ?? '')" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="tagline" :value="__('Tagline Kecil')" />
                        <x-text-input id="tagline" class="block mt-1 w-full" type="text" name="tagline" :value="old('tagline', $promotion->tagline ?? '')" />
                        <x-input-error class="mt-2" :messages="$errors->get('tagline')" />
                    </div>
                    
                    <div class="mb-4">
                        <x-input-label for="start_date" :value="__('Tanggal Mulai Promo')" />
                        <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date', $promotion->start_date ?? '')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                    </div>
                    
                    <div class="mb-4">
                        <label for="is_active" class="inline-flex items-center">
                            <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $promotion->is_active ?? false) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Aktif (Tampilkan)') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ $isEdit ? __('Perbarui Promosi') : __('Buat Promosi') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>