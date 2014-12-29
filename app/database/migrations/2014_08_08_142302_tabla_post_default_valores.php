<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaPostDefaultValores extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('post')->insert(array(
			'id'=>1,
			"content"=>"Benjamin Von Wong likes to light people on fire, transport them into surreal worlds, and sink them in underwater shipwrecks. The 27-year-old photographer aims to blur the line between fantasy and reality with his epic photo shoots, and the results are mesmerizing larger-than-life images. It’s hard to believe that just a few years ago, Ben was working in a gold mine in the deserts of Winnemucca, Nevada, as a mining engineer. Looking for a distraction after a breakup, Ben picked up a point-and-shoot camera and began to take it with him everywhere. What started as a hobby turned into a passion when he was offered his very first contract to shoot an event. “That was the first time in my life when I was paid to do something that I like to do,” Ben says. “That was really a magical moment for me.” (http://blog.flickr.net/en/2014/08/08/surreal-underwater-photo-shoot/)",
			"url_photo"=>"https://farm6.staticflickr.com/5198/14275318024_ba17f8211d_b.jpg",
			"status"=>true,
			"label"=>"gallery",
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time()+1 ),
		));
		DB::table('post')->insert(array(
			'id'=>91,
			"content"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque adipiscing ipsum id massa laoreet pretium. Pellentesque id urna diam. Maecenas consequat erat eleifend, scelerisque lacus in, mollis nulla. Sed elit sem, commodo ut nisl sit amet, aliquam lobortis mauris. Donec tellus diam, volutpat ac commodo quis, suscipit id orci. Vivamus facilisis erat in felis hendrerit dignissim. Aenean auctor erat sit amet arcu egestas imperdiet. Phasellus imperdiet purus mi, condimentum ullamcorper nisi imperdiet id. Mauris congue lorem id ante adipiscing convallis.",
			"url_video"=>"http://vimeo.com/103364847",
			"status"=>true,
			"type"=>"video",
			'created_at' => date( 'Y-m-d H:i:s', time()+20 ),
			'updated_at' => date( 'Y-m-d H:i:s', time()+20 ),
		));
		DB::table('post')->insert(array(
			'id'=>2,
			"type"=>"product",
			"content"=>"New Apple Iphone 4 32gb Ios7.0 3g 5mp Gps Wifi Unlocked Smartphone Black",
			"url_photo"=>'http://i.ebayimg.com/00/s/NjgzWDUwMA==/z/fKgAAOxyBjBTVfKz/$_12.JPG',
			"status"=>true,
			"label"=>"smartphone, technology",
			"data1"=>"259.00",
			"data2"=>"USD",
			"data3"=>"Envio Gratis",
			"data4"=>"Nuevo",
			"url_shop"=>"http://www.ebay.com/itm/NEW-APPLE-IPHONE-4-32GB-iOS7-0-3G-5MP-GPS-WIFI-UNLOCKED-SMARTPHONE-BLACK-/171308904158?pt=Cell_Phones&hash=item27e2ce6ede",
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time()+2 ),
		));
		DB::table('post')->insert(array(
			'id'=>3,
			"content"=>"They are here! Flying saucers, little green men, dreadful Aliens! They invade our planet and our homes this Flickr Friday. Let yourself be transported to another dimension, be inspired by good old movies, and stretch your imagination. Take your shot starting today or in the coming days and submit it to the group adding the hashtags #FlickrFriday and #Alien. We’ll feature some of our favorites on Flickr Blog next Friday. (http://blog.flickr.net/en/2014/08/08/flickr-friday-alien/)",
			"url_photo"=>"https://farm4.staticflickr.com/3838/14851496025_3d4f4b4299_b.jpg",
			"status"=>true,
			"label"=>"gallery, allien",
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time()+3 ),
		));
		DB::table('post')->insert(array(
			'id'=>4,
			"content"=>"Wildlife Wednesday: Macro world. In this week’s photo selection, let’s explore a few small species in all their glorious tiny details, including the eyes of a dragonfly to the protected entrance of a hornets’ nest. Here’s photography taken in Canada, U.S., India … “Portrait of a cooperative four-spotted skimmer dragonfly (Libellula quadrimaculata) photographed along the footpaths at Parc-nature du Bois-de-l’Île-Bizard. These dragonflies have a distinctive amber patch along the leading edge of their wings. Tamron SP Di 90mm F/2.8 (272E), Raynox DCR-250 and homemade onboard flash diffuser. Two-shot focus stack. Macro ratio is about 1.7:1 plus some cropping from the stacking process.” (http://blog.flickr.net/en/2014/08/06/wildlife-wednesday-macro-world/)",
			"url_photo"=>"https://farm6.staticflickr.com/5571/14190944177_144c1aa96a_b.jpg",
			"status"=>true,
			"label"=>"gallery, animalls",
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time()+4 ),
		));
		DB::table('post')->insert(array(
			'id'=>5,
			"type"=>"product",
			"content"=>"El color del optimismo. Brillante. Fresco. Limpio. Alegre. Eso es el color amarillo. Es el brillo del sol en persona. Todos se detienen a admirar el amarillo. Es un color que siempre llama la atención. Crea tu propio estilo deportivo con unas fabulosas zapatillas amarillas y un reloj de pulsera en el mismo tono. Moderniza tu forma de escuchar música con unos parlantes brillantes y habla con tus amigos con un divertido auricular para tu teléfono móvil.",
			"url_photo"=>'http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/FGYAAOSwo8hTrB0r/$_59.JPG?set_id=8800005007',
			"status"=>true,
			"label"=>"yellow, hogar",
			"data1"=>"184.99",
			"data2"=>"USD",
			"data3"=>"Envio Gratis",
			"url_shop"=>"http://www.ebay.com/itm/KENWOOD-KMix-Boutique-Coffee-Maker-Coffee-Machine-750ml-220V-240V-Yellow-CM028-/321444355472?&_trksid=p2056016.m2516.l5255",
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time()+5 ),
		));
		DB::table('post')->insert(array(
			'id'=>124,
			"type"=>"product",
			"content"=>"Fifty Shades of Grey: Book One of the Fifty Shades Trilogy",
			"url_photo"=>'http://ecx.images-amazon.com/images/I/515kzV0-w%2BL.jpg',
			"status"=>true,
			"label"=>"book",
			"data1"=>"$8.97",
			"data2"=>"USD",
			"data3"=>"FREE Shipping",
			'author_id'=>1,
			"data4"=>' Order within 43 hrs 16 mins and choose One-Day Shipping at checkout.',
			"url_shop"=>"http://www.amazon.com/Fifty-Shades-Grey-Book-Trilogy/dp/0345803485/ref=lp_23_1_3?s=books&ie=UTF8&qid=1407641740&sr=1-3",
			'created_at' => date( 'Y-m-d H:i:s', time() ),
			'updated_at' => date( 'Y-m-d H:i:s', time()+6 ),
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('post')->where('id','=',1)->delete();
		DB::table('post')->where('id','=',2)->delete();
		DB::table('post')->where('id','=',3)->delete();
		DB::table('post')->where('id','=',4)->delete();
		DB::table('post')->where('id','=',5)->delete();
	}

}
