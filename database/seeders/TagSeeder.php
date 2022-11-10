<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('tags')->insert([
        ['name' => 'Python',
         'disponibility' => 1],
        ['name' => 'C#',
         'disponibility' => 1],
        ['name' => 'Laravel',
         'disponibility' => 1],
        ['name' => 'Javascript',
         'disponibility' => 1],
        ['name' => 'PHP',
         'disponibility' => 1]
    ]);
    }
}
