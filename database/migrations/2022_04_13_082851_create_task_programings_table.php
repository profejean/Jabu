<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_programings', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->bigInteger('user_id');
            $table->bigInteger('task_id');
            $table->date('date');
            $table->string('title');
            $table->string('check');
            $table->longText('content');

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
        Schema::dropIfExists('task_programings');
    }
};
