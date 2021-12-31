<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'name' => 'shownu',
            'mail' => 'shownu@mail.jp',
            'age' => 30,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'minhyuk',
            'mail' => 'mh@mail.com',
            'age' => 28,
        ];
        DB::table('people')->insert($param);
        
        $param = [
            'name' => 'im',
            'mail' => 'im@mail.com',
            'age' => 26,
        ];
        DB::table('people')->insert($param);
    }
}
