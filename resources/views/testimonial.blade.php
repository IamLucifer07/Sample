<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Testimonials') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>"I just wanted to share a quick note and let you know that you guys do a really good job. I'm
                        glad I decided to work with you. It's really great how easy your websites are to update and
                        manage. I never have any problem at all."
                        <br>- John Doe
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>