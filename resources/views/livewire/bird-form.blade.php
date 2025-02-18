<div>
    <form wire:submit="submit">
        <div>
            <x-input-label for="count" :value="('Bird Count')" />
            <x-text-input wire:model="count" type="number" />
        </div>
        <div>
            <x-input-label for="notes" :value="('Notes')" />
            <textarea wire:model="notes" class="mt-1 block mb-4"></textarea>
        </div>
        <x-primary-button>Add Bird Count Entry</x-primary-button>
    </form>
</div>