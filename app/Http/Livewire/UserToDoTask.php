<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ToDoTask;

class UserToDoTask extends Component
{
    public $task;

    public function mount(ToDoTask $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.user-to-do-task');
    }

    public function markCompleted(ToDoTask $task)
    {
        $task->markComplete();
        $this->task = $this->task->fresh();
    }

    public function markActive(ToDoTask $task)
    {
        $task->markActive();
        $this->task = $this->task->fresh();
    }

    public function deleteItem(ToDoTask $task)
    {
        $task->remove();
        $this->emitUp('refreshComponent');
        $this->task = $this->task->fresh();
    }
}
