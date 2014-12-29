<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPublicidad extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advertse_campaign', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->dateTime('open')->nullable();
			$table->dateTime('end')->nullable();
			$table->longText('source')->nullable();
			$table->integer('presence')->default(0);
			$table->integer('author_id')->nullable()->unsigned();
			$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('advertse_campaign');
	}

}
