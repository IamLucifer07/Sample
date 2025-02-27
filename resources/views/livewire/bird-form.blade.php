<div>
    <form wire:submit="submit">
        <div>
            <x-input-label for="count" :value="('Bird Count')" />
            <x-text-input wire:model="count" type="number" />
        </div>
        <div>
            <x-input-label for="notes" :value="('Notes')" />

        </div>
        <x-primary-button wire:click="delete"
            wire:confirm="Are you sure you want to delete this?">Delete</x-primary-button>
        <x-primary-button>Add Bird Count</x-primary-button>
    </form>
</div>