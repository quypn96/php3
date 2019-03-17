<?php

use Illuminate\Database\Seeder;

class CreateDataPost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();

        $post = [];
        for ($i = 0; $i < 200; $i++) {
        	$p = [
        		'title'=> $faker->realText($maxNbChars = 50, $indexSize = 1),
        		'short_desc'=> $faker->realText($maxNbChars = 100, $indexSize = 1),
        		'content'=> $faker->realText($maxNbChars = 200, $indexSize = 1),
        		'image'=> $faker->imageUrl(300, 250),
                'category_id'=> $faker->numberBetween(1,5),
        		'subcategories_id'=> $faker->numberBetween(1,20),
                'slug_post'=> $faker->slug,
                'count_view'=> $faker->numberBetween(1,100),
        		'status'=> $faker->numberBetween(-1,1),
        		
        	];
        	array_push($post, $p);
        }
        DB::table('posts')->insert($post);
    }
}
