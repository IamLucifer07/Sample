<x-layouts.app :title="__('Edit Bird Entry')">
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Edit Bird Entry</h2>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('bird.update', $entry->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="bird_count" class="block text-sm font-medium text-gray-700">Bird Count</label>
                <input type="number" name="bird_count" id="bird_count"
                    value="{{ old('bird_count', $entry->bird_count) }}"
                    class="mt-1 block rounded-md border border-green-300 focus:border-indigo-500 focus:ring-indigo-500"
                    required>
                @error('bird_count')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="notes" class="block font-medium text-sm text-gray-700">Notes</label>
                <textarea id="notes" name="notes" wire:model="notes"
                    class="mt-1 block mb-4 rounded-md border border-green-300">{{ old('notes', $entry->notes) }}</textarea>
                @error('notes')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center px-4 py-2 bg-lime-300 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-lime-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">←
                    Back to Dashboard</a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-lime-300 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-lime-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    Update Bird Entry
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>