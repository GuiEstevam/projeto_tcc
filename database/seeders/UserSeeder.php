<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'Administrador',
            'email'=> 'admin@teste.com',
            'password'=> bcrypt('12345678'),
            'role_id'=> 1
        ]);      
    }
}
