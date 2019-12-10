<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bands', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('genre_id')->nullable();
            $table->string('name',191)->nullable();
            $table->text('description')->nullable();
            $table->date('doc')->nullable();
            $table->unsignedInteger('location_id')->nullable();
            $table->string('avatar')->default('/uploads/avatar/default.jpg');
            $table->tinyInteger('status')->default(1);
            $table->text('about')->nullable();
            $table->text('achievements')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('number_of_mem')->default(1);
            $table->string('phone_manager',11)->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('bands');
    }
}
