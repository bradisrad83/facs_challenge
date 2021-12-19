<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToDoTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_do_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('to_do_list_id');
            $table->string('name');
            $table->integer('order')->nullable();
            $table->boolean('completed')->default(0);
            $table->datetime('completed_at')->nullable();
            $table->datetime('due_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_do_tasks');
    }
}
