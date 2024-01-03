<?php

namespace App\Livewire;

use Livewire\Component;

class Offerings extends Component
{

    public $altars;

    public function mount()
    {
        $this->altars = json_decode(file_get_contents(storage_path() . "/data/offerings.json"), true);
    }

    public function render()
    {
        return view('livewire.offerings');
    }
}
