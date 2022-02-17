<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class vendorDetails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vendor_details')->insert([
            [
                'experience' => 'N\A',
                'service' => 'N\A',
                'payment' => 'N\A',
                'price' => 'N\A',
                'date' => 'N\A',
                'location' => 'N\A',
                'email' => 'N\A',
                'txt' => 'N\A',
            ],
        ]);
    }
}
