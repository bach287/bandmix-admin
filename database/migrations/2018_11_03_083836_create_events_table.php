<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * Class CreateEventsTable.
 */
class CreateEventsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('avatar')->default('/uploads/avatar/default.jpg');
            $table->unsignedInteger('location_id')->default(1);
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->text('number_phone')->nullable();
            $table->string('mail')->nullable();
            $table->integer('vacancy')->nullable();
            $table->integer('ticket_also')->nullable();
            $table->decimal('price')->default(0);
            $table->unsignedInteger('member_id')->nullable();
            $table->unsignedInteger('genre_id')->nullable();
            $table->unsignedInteger('is_on_top')->default(0);
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('location_detail')->nullable();
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
		Schema::drop('events');
	}
}
