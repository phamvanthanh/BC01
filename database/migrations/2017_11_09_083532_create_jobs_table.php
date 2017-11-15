<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
         
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('name', 150);
            $table->string('requirement', 512);
            $table->integer('holder_id')->unsigned()->nullable();
            $table->string('type', 20);
            $table->date('from_date');
            $table->date('to_date');
            $table->string('status', 20)->nullable();
            $table->tinyInteger('bid_status')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('jobs');
            $table->foreign('holder_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
