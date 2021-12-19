<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
    * Get the use associated with the list
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tasks associated with the list
     */
    public function tasks()
    {
        return $this->hasMany(ToDoTask::class)->withTrashed();
    }
}
