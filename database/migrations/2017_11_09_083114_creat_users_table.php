<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');     
            $table->string('email', 200);
            $table->string('name', 200);
            $table->char('nation_abbr', 3)->nullable();
            $table->string('password');
            $table->rememberToken();                       
            $table->timestamps();
            // $table->foreign('nation_abbr')->references('abbr')->on('nations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
