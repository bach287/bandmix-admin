<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBillDetailsTable.
 */
class CreateBillDetailsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bill_details', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bill_id')->nullable();
            $table->unsignedInteger('event_id')->nullable();
            $table->integer('number_of_ticket')->nullable();
            $table->unsignedInteger('book_id')->nullable();
            $table->integer('price')->nullable();
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
		Schema::drop('bill_details');
	}
}
