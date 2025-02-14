<div>
    <form wire:submit="submit">
        <div>
            <label for="count">Bird Count: </label>
            <input wire:model="count" type="number" />
        </div>
        <div>
            <label for="notes">Notes: </label>
            <textarea wire:model="notes"></textarea>
        </div>
        <button class="border">Add a New Bird Count Entry</button>
    </form>
</div>