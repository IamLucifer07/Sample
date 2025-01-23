<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-lg font-medium mb-6">You're in the About Section!</p>

                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf <!-- Laravel's CSRF token -->

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <!-- Content -->
                        <div>
                            <x-input-label for="content" :value="__('Content')" />
                            <textarea id="content" name="content" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <!-- Image 1 -->
                        <div>
                            <x-input-label for="image1" :value="__('Image 1 (Max: 1MB)')" />
                            <input id="image1" name="image1" type="file" accept="image/*"
                                class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                            <x-input-error class="mt-2" :messages="$errors->get('image1')" />
                        </div>

                        <!-- Image 2 -->
                        <div>
                            <x-input-label for="image2" :value="__('Image 2 (Max: 1MB)')" />
                            <input id="image2" name="image2" type="file" accept="image/*"
                                class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                            <x-input-error class="mt-2" :messages="$errors->get('image2')" />
                        </div>

                        <!-- Video -->
                        <div>
                            <x-input-label for="video" :value="__('Video (Max: 10MB)')" />
                            <input id="video" name="video" type="file" accept="video/*"
                                class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                            <x-input-error class="mt-2" :messages="$errors->get('video')" />
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>