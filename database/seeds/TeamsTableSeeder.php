<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create(['name' => 'Testovací tým']);
        Team::create(['name' => 'Node5 staff']);
    }
}
