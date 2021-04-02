<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToDosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_dos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->date('assignedDate');
            $table->date('completedDate')->nullable();
            $table->string('assignedTo');
            $table->date('deadline');
            $table->string('task_priority');
            $table->string('fileUpload')->nullable();
            $table->string('assignedBy');
            $table->string('ReAssignedBy')->nullable();
            $table->string('reAssignedTo')->nullable();
            $table->date('reAssignedDate')->nullable();
            $table->date('reDeadline')->nullable();
            $table->longText('reason')->nullable();
            $table->boolean('status')->default(0);
            $table->longText('remarks')->nullable();
            $table->integer('user_id');
            $table->integer('ReUser_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_dos');
    }
}
