<?php

use Illuminate\Database\Seeder;

class CreateDataUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		'email' => 'admin@gmail.com', 
        		'name' => 'admin',
        		'password' => Hash::make('123456')
        	],
        	[
        		'email' => 'quycoi@gmail.com', 
        		'name' => 'Quy',
        		'password' => Hash::make('quycoi')
        	]
        ];
        DB::table('users')->insert($users);
    }
}
