<?php

namespace App\Livewire;

use App\Models\Entry;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class BirdForm extends Component
{
    public int $count;
    public string $notes;

    public function mount()
    {
        $this->count = 0;
        $this->notes = '';
    }
    public function submit()
    {
        // \Log::info('Submit method called');

        $this->validate([
            'count' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        Entry::create([
            'bird_count' => $this->count,
            'notes' => $this->notes,
        ]);

        // \Log::info('Resetting form');
        // $this->count->0  $this->notes = '';
        $this->reset();
    }
    public function render()
    {
        return view('livewire.bird-form');
    }
}
