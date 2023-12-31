<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-7">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Available games') }}
                </h2>

                <a href="{{ route('dashboard') }}">{{ __('Back') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('game')
            </div>
        </div>
    </div>
</x-app-layout>
