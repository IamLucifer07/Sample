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
                                        @if(session('success'))
                                            <div id="successMessage" class="text-green-500 p-4 rounded-lg mb-4">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <form action="{{ route('about.store') }}" method="POST"
                                            enctype="multipart/form-data" class="mt-6 space-y-6">
                                            @csrf
                                            <x-input-label for="title" :value="__('Title')" />
                                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                                required autofocus autocomplete="title" />
                                            <x-input-error class="mt-2" :messages="$errors->get('title')" />

                                            <x-input-label for="content" :value="__('Content')" />
                                            <textarea id="content" name="content" class="mt-1 block w-full"></textarea>
                                            <x-input-error class="mt-2" :messages="$errors->get('content')" />

                                            <x-input-label for="media_type" :value="__('Media Type')" />
                                            <select id="media_type" name="media_type" class="mt-1 block w-full"
                                                onchange="toggleMediaInput()">
                                                <option value="">{{ __('Select Media Type') }}</option>
                                                <option value="images">{{ __('Images') }}</option>
                                                <option value="videos">{{ __('Videos') }}</option>
                                            </select>
                                            <x-input-error class="mt-2" :messages="$errors->get('media_type')" />

                                            <div id="imagesInput" class="hidden">
                                                <x-input-label for="images" :value="__('Upload Images')" />
                                                <input id="images" name="images[]" type="file" class="mt-1 block w-full"
                                                    multiple />
                                                <x-input-error class="mt-2" :messages="$errors->get('images')" />
                                            </div>

                                            <div id="videosInput" class="hidden">
                                                <x-input-label for="videos" :value="__('Upload Videos')" />
                                                <input id="videos" name="videos" type="file"
                                                    class="mt-1 block w-full" />
                                                <x-input-error class="mt-2" :messages="$errors->get('videos')" />
                                            </div>

                                            <x-primary-button class="mt-4">
                                                {{ __('Submit') }}
                                            </x-primary-button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function toggleMediaInput() {
                                const mediaType = document.getElementById('media_type').value;
                                document.getElementById('imagesInput').classList.add('hidden');
                                document.getElementById('videosInput').classList.add('hidden');

                                if (mediaType === 'images') {
                                    document.getElementById('imagesInput').classList.remove('hidden');
                                } else if (mediaType === 'videos') {
                                    document.getElementById('videosInput').classList.remove('hidden');
                                }
                            }
                        </script>
                    </x-app-layout>

                    <script>

                        setTimeout(function () {
                            const successMessage = document.getElementById('successMessage');
                            if (successMessage) {
                                successMessage.style.display = 'none';
                            }
                        }, 5000);
                    </script> @if(session('success'))
                        <div id="successMessage" class="bg-green-500 text-black p-4 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus
                            autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />

                        <x-input-label for="content" :value="__('Content')" />
                        <textarea id="content" name="content" class="mt-1 block w-full"></textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content')" />

                        <x-input-label for="image1" :value="__('Image 1')" />
                        <input id="image1" name="image1" type="file" class="block mt-1 w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('image1')" />

                        <x-input-label for="image2" :value="__('Image 2')" />
                        <input id="image2" name="image2" type="file" class="block mt-1 w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('image2')" />

                        <x-input-label for="video" :value="__('Video')" />
                        <input id="video" name="video" type="file" class="block mt-1 w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('video')" />

                        <div>
                            <button type="submit"
                                class="bg-indigo-600 text-black py-2 px-4 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if($errors->has('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
            {{ $errors->first('error') }}
        </div>
    @endif
</x-app-layout>

{{--success message --}}
<script>

    setTimeout(function () {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 5000);
</script>