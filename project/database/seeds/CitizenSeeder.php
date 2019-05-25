<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Citizen::class, 20)->create();

//        DB::table('citizens')->insert([
//            'name' => \Illuminate\Support\Str::random(15),
//            'surname' => \Illuminate\Support\Str::random(15),
//            'father_name' => \Illuminate\Support\Str::random(15),
//            'mother_name' => \Illuminate\Support\Str::random(15),
//            'birth_date' => \Illuminate\Support\Facades\Date::createFromDate('y-m-d')
//
//        ])
    }
}
