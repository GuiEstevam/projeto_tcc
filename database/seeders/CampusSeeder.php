<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('campuses')->insert([
        ['name' => 'Campus Guarulhos',
        'disponibility' => 1],
       ['name' => 'Campus São Paulo',
        'disponibility' => 1],
       ['name' => 'Campus São Miguel',
        'disponibility' => 1],
       ['name' => 'Campus Osasco',
        'disponibility' => 1],
       ['name' => 'Campus São José',
        'disponibility' => 1],  
    ]);  
    }
}
