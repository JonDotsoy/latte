<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaComent extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_author')->nullable();
			$table->string('email_author')->nullable();
			$table->string('web_author')->nullable();
			$table->string('content')->nullable();
			$table->integer('like')->default(0);
			$table->integer('not_like')->default(0);
			$table->integer('post_id')->unsigned()->nullable();
			$table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
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
		Schema::drop('comment');
	}

}
