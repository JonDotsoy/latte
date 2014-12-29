<?php

class articleController extends \BaseController {

	function createArticle($preArticle = null) {

		$public_imgs = '/'.'img/';
		$folder_imgs = public_path().$public_imgs;
		$urlphoto = NULL;

		// si no existe la carpeta de fotos, esta es creada
		if (!is_dir($folder_imgs)) {
			if (!mkdir($folder_imgs)) {
				return App::abort(500);
			}
		}


		if ($preArticle != null) {
			$preArticle = hexdec($preArticle);
			$post = Post::find($preArticle);
		} else {
			$post = new Post;
		}


		if (Input::hasFile('photo')) {
			$file = Input::file('photo');
			$nameFile = $file->getClientOriginalName();
			$nameFile = time().'-'.Auth::User()->id.'-'.$nameFile;

			$endPath = $public_imgs.$nameFile;
			Input::file('photo')->move($folder_imgs, $nameFile);

			$urlphoto = URL::to($endPath);
			$post->url_photo = $urlphoto;
		}

		if (Input::has('type')) {

			$post->content = Input::get('content');
			if ($preArticle == null) {
				$post->author()->associate(Auth::User());
			}

			if (Input::has('status')) {
				if (Input::get('status') == "on") {
					$post->status = true;
				}
				if (Input::get('status') == "off") {
					$post->status = false;
				}
			}

			if (Input::has('ResetDate')) {
				$post->updated_at = date( 'Y-m-d H:i:s', time() );
				$post->created_at = $post->updated_at;
			}

			if (Input::get('type')=='article') {
				$post->type = 'post';
				$post->save();
			}

			if (Input::get('type')=='video') {
				$post->type = 'video';
				$post->url_video = Input::get('urlvideo');

				try {
					//http://vimeo.com/api/v2/brad/appears_in.xml
					$ch = curl_init();
					curl_setopt($ch,CURLOPT_URL,"http://vimeo.com/api/v2/video/".$post->getIDVideo().".json");
					curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
					$output=curl_exec($ch);
					$ecdJson = json_decode($output);
					# print_r($ecdJson[0]->thumbnail_large);exit;
					if (count($ecdJson) == 1) {
						if (isset($ecdJson[0]->thumbnail_large)) {
							$post->url_photo = $ecdJson[0]->thumbnail_large;
						}
					}
				} catch (Exception $e) {
					
				}

				$post->save();
			}

			if (Input::get('type') == 'product') {
				$post->type = 'product';
				$post->url_shop = Input::get('url_shop');
				$post->data1 = Input::get('data1');
				$post->data2 = Input::get('data2');
				$post->data3 = Input::get('data3');
				$post->data4 = Input::get('data4');
				$post->save();
			}

		} else {
			return App::abort(500);
		}


		return View::make('success.newArticle', array('post'=>$post));
	}

	function deleteComment($comment_id = null) {
		$comment = Comment::find($comment_id);
		$post = $comment->post();

		if ($post->count() == 1) {
			$post = $post->get()[0];
			$comment->delete();
			return Redirect::to($post->url());
		} else {
			return Redirect::to('/');
		}
	}

	function createComment($article_id = null) {
		$article_id = hexdec($article_id);

		$post = Post::find($article_id);

		$comment = new Comment;

		$comment->name_author = Input::get('name');
		$comment->email_author = Input::get('email');
		$comment->web_author = Input::get('website');
		$comment->content = Input::get('comment');

		Session::put('name',Input::get('name'));
		Session::put('email',Input::get('email'));
		Session::put('website',Input::get('website'));
		Session::put('comment',Input::get('comment'));

		$comment->post()->associate($post);

		$comment->save();
		
		Session::put('lastComment',$comment->id);

		return Redirect::to($post->url());
	}

	function showArticle($article_id = null) {
		$article_id = hexdec($article_id);
		$post = Post::find($article_id);

		if (!$post) {
			return App::abort(404);
		}

		return View::make('post',array('post'=>$post,'showComment'=>true));
	}

	function deleteArticle($article_id) {
		$article_id = hexdec($article_id);
		$post = Post::find($article_id);

		if ((Auth::User()->isSuperAdmin()) || ($post->author->id == Auth::User()->id)) {
			if (Post::find($article_id)->delete()) {
				return View::make('success.removeArticle');
			} else {
				return View::make('errors.removeArticle',array("url"=>$post->url()));
			}
		} else {
			return App::abort(500);
		}
	}

	function editArticle($article_id) {
		$article_id = hexdec($article_id);
		$post = Post::find($article_id);

		return View::make('editPost',array('post'=>$post));
	}

	function likedAricle($article_id){
		$article_id = hexdec($article_id);
		$post = Post::find($article_id);

		$liked = false;
		$nliked = $post->like;

		if (!Session::has("liked_in_".$article_id)) {

			$post->like = $post->like + 1;
			$nliked = $post->like;

			if ($post->save()) {
				$liked = true;
				Session::put("liked_in_".$article_id,true);
			} else {
				return App::abort(500);
			}
		}

    	return Response::json(array('liked'=>$liked,'nLiked'=>$nliked));
	}

	function getlikedAricle($article_id){
		$article_id = hexdec($article_id);
		$post = Post::find($article_id);

		$liked = false;
		$nliked = $post->like;

		if (Session::has("liked_in_".$article_id)) {
			$liked = true;
		}

    	return Response::json(array('liked'=>$liked,'nLiked'=>$nliked));
	}
}
