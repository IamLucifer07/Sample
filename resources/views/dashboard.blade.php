<x-app-layout>

    <head>
        <script src="https://unpkg.com/lucide@latest"></script>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i data-lucide="home"></i>
            {{ __('messages.Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're in Dashboard!") }}
                </div>
            </div>
        </div> --}}
    </div>
    <div class="py-12">
        @auth
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <i data-lucide="bird"></i>
                <livewire:bird-form />
            </div>
        @endauth
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">All Bird Entries</h3>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Note</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Bird Count</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($entries as $entry)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $entry->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $entry->notes }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $entry->bird_count }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($entry->created_at)->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('bird.edit', $entry->id) }}"
                                    class="text-indigo-600 hover:underline">Update</a>
                                |
                                <form action="{{ route('bird.destroy', $entry->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            lucide.createIcons();
        });
    </script>
</x-app-layout>