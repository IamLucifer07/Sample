<?php

use App\Livewire\BirdForm;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(BirdForm::class)
        ->assertStatus(200);
});
