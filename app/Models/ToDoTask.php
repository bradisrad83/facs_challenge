<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDoTask extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'completed_at'  => 'datetime',
        'due_at'        => 'datetime',
    ];

    /**
     * Get the todolist associated with the todoitem
     */
    public function list()
    {
        return $this->belongsTo(ToDoList::class);
    }

    /**
     * Check if the todoitem has been marked completed
     *
     * @return boolean
     */
    public function isComplete()
    {
        return $this->completed;
    }

    /**
     * Mark Task as completed
     *
     */
    public function markComplete()
    {
        $this->completed = true;
        $this->completed_at = now();
        $this->save();
    }

    /**
     * Mark Task as active
     */
    public function markActive()
    {
        $this->completed = false;
        $this->completed_at = null;
        $this->save();
    }

    /**
     * delete task (soft)
     */
    public function remove()
    {
        $this->delete();
        $this->save();
        return $this;
    }
}
