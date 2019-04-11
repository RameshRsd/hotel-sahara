<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'sahara','email'=>'saharainn@gmail.com','password'=>bcrypt('saharainn')]


        ]);
    }
}
