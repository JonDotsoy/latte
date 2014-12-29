<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaUserDefault extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users')->insert(array(
			'id' => 1,
			'user' => 'admin',
			'nombre' => 'Administrador',
			'email' => 'admin@admin',
			'pass' => md5('admin'),
			'roll' => 1,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('users')->where('id','=',1)->delete();
	}

}
