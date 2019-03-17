<?php

use Illuminate\Database\Seeder;

class CreateDataSubcategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            [
                'name'=>'Bóng đá',
                'category_id'=>'2',
                'slug_subcategories'=>'bongda'
            ],
        	[
        		'name'=>'Thể thao mới nhất',
        		'category_id'=>'2',
                'slug_subcategories'=>'thethaomoinhat'
        	],
        	[
        		'name'=>'Thể thao VN',
        		'category_id'=>'2',
                'slug_subcategories'=>'thethaovn'
        	],
        	[
        		'name'=>'Bóng đá thế giới',
        		'category_id'=>'2',
                'slug_subcategories'=>'bongdathegioi'
        	],
        	[
        		'name'=>'Bóng đá Vn',
        		'category_id'=>'2',
                'slug_subcategories'=>'bongdavn'
        	],
        	[
        		'name'=>'Điểm nóng',
        		'category_id'=>'3',
                'slug_subcategories'=>'diemnong'
        	],
        	[
        		'name'=>'Quân sự',
        		'category_id'=>'3',
                'slug_subcategories'=>'quansu'
        	],
        	[
        		'name'=>'Thế giới trong ngày',
        		'category_id'=>'3',
                'slug_subcategories'=>'thegioitrongngay'
        	]
        ];
        DB::table('subcategories')->insert($subcategories);
    }
}
