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
                            <input id="images" name="images[]" type="file" class="mt-1 block w-full" multiple />
                            <x-input-error class="mt-2" :messages="$errors->get('images')" />
                        </div>

                        <div id="videosInput" class="hidden">
                            <x-input-label for="videos" :value="__('Upload Videos')" />
                            <input id="videos" name="videos" type="file" class="mt-1 block w-full" />
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

    {{-- @foreach($abouts as $about)
    <div class="p-4 border rounded mb-4">
        <h3 class="text-lg font-bold">{{ $about->title }}</h3>
        <p>{{ $about->content }}</p>

        @if($about->media_type === 'images' && !empty($about->media))
        <div class="flex gap-2 mt-2">
            @foreach($about->media as $image)
            <img src="{{ asset('storage/' . $image) }}" class="w-32 h-32 object-cover rounded">
            @endforeach
        </div>
        @elseif($about->media_type === 'videos' && !empty($about->media))
        <video width="320" height="240" controls class="mt-2">
            <source src="{{ asset('storage/' . $about->media[0]) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        @endif
    </div>
    @endforeach --}}

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
</script>