<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {
        logger('dashboared has been mounted!!!!!!!!');
        logger(request()->ip());
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
