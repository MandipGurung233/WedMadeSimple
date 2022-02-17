<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class vendorPost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            [
                'uploadDate' => 'N\A',
                'imgFile' => 'N\A',
                'sessionEmail' => 'N\A',
                'caption' => 'N\A',
            ],
        ]);
    }
}
