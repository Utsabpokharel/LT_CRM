<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id');
            $table->date('from');
            $table->date('to');
            $table->integer('leave_type');
            $table->longText('leave_reason');
            $table->date('applied_on');
            $table->enum('status', ['Pending', '0', '1'])->default('Pending');
            $table->longText('admin_remarks')->nullable();
            $table->integer('applied_by');
            $table->date('checked_on')->nullable();
            $table->integer('checked_by')->nullable();
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
        Schema::dropIfExists('leaves');
    }
}
