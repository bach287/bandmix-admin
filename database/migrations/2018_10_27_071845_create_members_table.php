<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMembersTable.
 */
class CreateMembersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name',191)->nullable();
            $table->string('password');
            $table->date('dob')->nullable();
            $table->string('address',191)->nullable();
            $table->string('email',191)->unique();
            $table->string('phone_number')->nullable();
            $table->tinyInteger('gender')->default('1');
            $table->string('avatar')->default('images/uploads/avatar/default.jpg');
            $table->tinyInteger('status')->default('1');
            $table->string('slug')->nullable();
            $table->string('remember_token',100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
		Schema::drop('members');
	}
}
