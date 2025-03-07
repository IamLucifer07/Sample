<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Gallery Images -->
                    {{-- <div class="space-y-4">
                        <img src="{{ asset('images/Mimi.jpg') }}" alt="People watching at Laptop"
                            class="w-full h-auto rounded-lg shadow-md">
                        <img src="{{ asset('images/people.jpg') }}" alt="People watching at Laptop"
                            class="w-full h-auto rounded-lg shadow-md">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>