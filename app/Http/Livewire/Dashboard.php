<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ToDoList;
use App\Models\User;

class Dashboard extends Component
{
    public $showForm = false;
    public $title;
    public $lists;
    public $user;

    public $rules = [
        'title' => 'required',
    ];

    public function mount()
    {
        $this->createOrGetuser();
        $this->lists = $this->user->lists;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function newList()
    {
        $this->showForm = true;
    }

    public function cancel()
    {
        $this->title = '';
        $this->showForm = false;
    }

    public function create()
    {
        $this->validate();
        $list = new ToDoList();
        $list->title = $this->title;
        $list->user_id = $this->user->id;
        $list->save();
        $this->lists = $this->user->lists->fresh();
        $this->cancel();
    }

    public function createOrGetuser()
    {
        $ip  = request()->ip();
        if (!$user = User::where('ip_address', $ip)->first()) {
            $user = new User();
            $user->ip_address = $ip;
            $user->save();
        }
        $this->user = $user;
    }
}
