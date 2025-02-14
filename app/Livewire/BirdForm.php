<?php

namespace App\Livewire;

use App\Models\Entry;
use Livewire\Component;

class BirdForm extends Component
{
    public int $count;
    public string $notes;
    public function submit()
    {
        Entry::create([
            'bird_count' => $this->count,
            'notes' => $this->notes,
        ]);

        $this->reset();
    }
    public function render()
    {
        return view('livewire.bird-form');
    }
}
