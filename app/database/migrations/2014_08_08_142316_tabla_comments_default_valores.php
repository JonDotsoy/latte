<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaCommentsDefaultValores extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('comment')->insert(array(
			'id'=>1,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, voluptatem sed consequatur?',
			'post_id'=>1,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>2,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe ex, nobis non!',
			'post_id'=>1,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>3,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore odio fugit saepe?',
			'post_id'=>2,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>4,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est nulla placeat atque.',
			'post_id'=>2,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>5,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia illo eaque asperiores?',
			'post_id'=>2,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>6,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam hic at officia?',
			'post_id'=>3,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>7,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus quidem laudantium reiciendis.',
			'post_id'=>3,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>8,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus beatae neque ad.',
			'post_id'=>4,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>9,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, sapiente quisquam asperiores.',
			'post_id'=>5,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>10,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque alias cumque sapiente.',
			'post_id'=>5,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>11,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum minima, id neque.',
			'post_id'=>5,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>12,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam odit, nemo sit.',
			'post_id'=>5,
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time() ),
		));
		DB::table('comment')->insert(array(
			'id'=>13,
			'name_author'=>'Jonathan Delgado',
			'email_author'=>'jonad.correo@gmail.com',
			'web_author'=>'http://jonad.in/',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde voluptates maxime, nemo.',
			'post_id'=>5,
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
		DB::table('comment')->where('id','=',1)->delete();
		DB::table('comment')->where('id','=',2)->delete();
		DB::table('comment')->where('id','=',3)->delete();
		DB::table('comment')->where('id','=',4)->delete();
		DB::table('comment')->where('id','=',5)->delete();
		DB::table('comment')->where('id','=',6)->delete();
		DB::table('comment')->where('id','=',7)->delete();
		DB::table('comment')->where('id','=',8)->delete();
		DB::table('comment')->where('id','=',9)->delete();
		DB::table('comment')->where('id','=',10)->delete();
		DB::table('comment')->where('id','=',11)->delete();
		DB::table('comment')->where('id','=',12)->delete();
		DB::table('comment')->where('id','=',13)->delete();
	}

}
