<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UpdateAllSlug extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

			$posts = App\Post::get();
			foreach ($posts as $post) {
				if($post->description == '') {
					$post->description = $post->name;
				}
				if($post->content == '') {
					$post->content = $post->description;
				}
				$post->save();
			}

			$stores = App\Store::get();
			foreach ($stores as $store) {
				$store->save();
			}

    }
}
