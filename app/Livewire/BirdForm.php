<?php

namespace App\Livewire;

use App\Models\Entry;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class BirdForm extends Component
{
    public int $count;
    public string $notes;

    public function submit()
    {

        $this->validate([
            'count' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        Entry::create([
            'bird_count' => $this->count,
            'notes' => $this->notes,
        ]);

        return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.bird-form');
    }
}
