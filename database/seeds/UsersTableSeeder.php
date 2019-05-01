<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $user =\App\User::create([
        	'name'      => 'marwan',
        	'age'       => '20',
        	'email'     => 'marwan@gmail.com',
        	'Incomerate'=> '0.0',
        	'HourSalary'=> '0.0',
        	'phone'     =>'01111946764',
        	'password'  => bcrypt('123456'),
            'image'     => 'admin.jpg',

        ]);
        $user->attachRole('Owner');
    }//end of run
}//end of seeder






