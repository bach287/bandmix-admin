<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateNewsTable.
 */
class CreateNewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
			$table->string('title')->nullable();
			$table->text('description')->nullable();
			$table->text('body')->nullable();
			$table->tinyInteger('status')->default(0);
			$table->tinyInteger('is_show_home')->default(0);
			$table->integer('category_id')->nullable();
			$table->string('avatar')->default('default.jpg');
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
		Schema::drop('news');
	}
}
