<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPost extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function(Blueprint $table)
		{
			$table->increments('id');
			$table->longText('content')->nullable();
			$table->string('type')->nullable()->default('post');
			$table->boolean('status')->default(false);
			$table->string('url_photo')->nullable();
			$table->string('url_video')->nullable();
			$table->string('label')->nullable();
			$table->string('data1')->nullable();
			$table->string('data2')->nullable();
			$table->string('data3')->nullable();
			$table->string('data4')->nullable();
			$table->integer('like')->default(0);
			$table->integer('not_like')->default(0);
			$table->string('url_shop')->default(0)->nullable();
			$table->integer('author_id')->unsigned()->nullable();
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
		Schema::drop('post');
	}

}
