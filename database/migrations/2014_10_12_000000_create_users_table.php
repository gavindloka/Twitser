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
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            $table->increments('user_id');
            $table->string('username', 50);
            $table->string('password');
            $table->string('email', 50);
            $table->string('url', 255);
            $table->string('phone_number', 20);
            $table->string('is_verified');
            $table->text('bio');
            $table->enum('role', ['guest','member','admin']);
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
        Schema::dropIfExists('users');
    }
};
