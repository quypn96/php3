<?php

use Illuminate\Database\Seeder;

class CreateDataCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'=>'Fashion',
                'slug_category'=>'fashion'
            ],
        	[
        		'name'=>'Thể thao',
                'slug_category'=>'thethao'
        	],
        	[
        		'name'=>'Thế giới',
                'slug_category'=>'thegioi'
        	],
        	[
        		'name'=>'Chính trị',
                'slug_category'=>'chinhtri'
        	],
        	[
        		'name'=>'Xã hội',
                'slug_category'=>'xahoi'
        	]
        ];
        DB::table('categories')->insert($categories);
    }
}
