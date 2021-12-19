<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ToDoList;
use App\Models\ToDoTask;

class UserToDoList extends Component
{
    public $list;
    public $showForm = false;
    public $name;
    public $tasks;
    public $due_by;

    public $rules = [
        'name'      => 'required',
        'due_by'    => 'required'
    ];

    protected $listeners = ['refreshComponent' => 'getTasks'];

    public function mount(ToDoList $list)
    {
        $this->list = $list;
        $this->tasks = $this->list->tasks;
    }

    public function render()
    {
        return view('livewire.user-to-do-list');
    }

    public function showForm()
    {
        $this->showForm = true;
    }

    public function cancel()
    {
        $this->name = '';
        $this->showForm = false;
    }

    public function createTask()
    {
        $this->validate();
        $task = new ToDoTask();
        $task->name = $this->name;
        $task->to_do_list_id = $this->list->id;
        $task->due_by = $this->due_by;
        $task->order = ($this->list->tasks->count() + 1);
        $task->save();
        $this->list = $this->list->refresh();
        $this->getTasks();
        $this->name = '';
        $this->due_by = '';
    }

    public function getTasks()
    {
        $this->tasks = $this->list->tasks;
    }
}
