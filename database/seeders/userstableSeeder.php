<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
class userstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //Admin

            [
                'name'=>'Admin',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('111'),
                'role'=>('admin'),
                'status'=>('active'),
            ],
            [
                'name'=>'Agents',
                'username'=>'agents',
                'email'=>'agents@gmail.com',
                'password'=>Hash::make('111'),
                'role'=>('agent'),
                'status'=>('active'),
            ],

            [
                'name'=>'Users',
                'username'=>'users',
                'email'=>'users@gmail.com',
                'password'=>Hash::make('111'),
                'role'=>('user'),
                'status'=>('active'),
            ]



            ]);
    }
}
