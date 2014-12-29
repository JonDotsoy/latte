<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefaultTablaPublicidad extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('advertse_campaign')->insert(array(
			'id'=>1,
			'title'=>'Campaña de prueba',
			'description'=>'Creada para probar la aplicación.',
			'open'=>date( 'Y-m-d H:i:s', time() ),
			'end'=>date( 'Y-m-d H:i:s', time() + 60*60*234 ),
			'source'=>"# [Este es el titulo de una publicidad](#)\n\nPuede tener una leyenda como esta, que permita definir múltiples conceptos con contenidos.\n\n[Enlace a](#)",
			'presence' => 1,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));

		DB::table('advertse_campaign')->insert(array(
			'id'=>2,
			'title'=>'Segunda campaña de prueba',
			'description'=>'Creada para probar la aplicación.',
			'open'=>date( 'Y-m-d H:i:s', time() ),
			'end'=>date( 'Y-m-d H:i:s', time() + 60*60*234 ),
			'source'=>"<img class=\"img-responsive img\" src=\"http://lorempixel.com/100/260/city/\">\n\n[Visita nuestra Web](#)",
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
		//
	}

}
