<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ToDoList;

class Dashboard extends Component
{
    public $showForm = false;
    public $title;
    public $lists;

    public $rules = [
        'title' => 'required',
    ];

    public function mount()
    {
        $this->lists = collect();
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
        $list->save();
        $this->lists->push($list);
        $this->cancel();
    }
}
