<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class vendorApprove extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('approveds')->insert([
            [
                'name' => 'Shanti Make Up',
                'address' => 'Itahari',
                'email' => 'gurungmandip111@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Make Up',
                'file' => 'photo.png',
                'description' => 'One stop solution for all your make up offering both home and studio service with 2 years of experience',
           ],
            [
                'name' => 'Niraj Make Up',
                'address' => 'Dharan',
                'email' => 'tamu0057@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Make Up',
                'file' => 'photo.png',
                'description' => 'Offers multiple make up as per customer demands with both home and studio service',
      
            ],
            [
                'name' => 'Rishi Make Up',
                'address' => 'Dharan',
                'email' => 'rishi@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Make Up',
                'file' => 'photo.png',
                'description' => 'Get all your make up need with best price and get both home as well as studio service',
            ],
            [
                'name' => 'Hancy Make Up',
                'address' => 'Dharahara',
                'email' => 'hancy@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Make Up',
                'file' => 'photo.png',
                'description' => 'Make up makes you looks good so book it at best price with both home and studio service',
            ],
            [
                'name' => 'Hancy kto Make Up',
                'address' => 'Dharahara',
                'email' => 'kto@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Make Up',
                'file' => 'photo.png',
                'description' => 'Hancy Make up makes you looks confidence so book it with both service as per demands',
            ],
            [
                'name' => 'Darpan Bhojan',
                'address' => 'Tarahara',
                'email' => 'darpan@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Venue',
                'file' => 'photo.png',
                'description' => 'Darapan palace offers best venue with asthetic environment to make your day special at best price',
             ],
            [
                'name' => 'Rcity palace',
                'address' => 'Jhumka',
                'email' => 'rcity@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Venue',
                'file' => 'photo.png',
                'description' => 'Our venue offers an asthetic and decorative environment to make your moment memorable',
          
            ],
            [
                'name' => 'Simple palace',
                'address' => 'Jhumki',
                'email' => 'simple@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Venue',
                'file' => 'photo.png',
                'description' => 'Our simple venue offers an asthetic environment to cherish your moment',
          
            ],
            [
                'name' => 'Indra palace',
                'address' => 'Jhuma',
                'email' => 'indra@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Venue',
                'file' => 'photo.png',
                'description' => 'With one hundred customer satisfaction we offer at best price best venue with high decoration to make your program special',
           ],
           [
            'name' => '3 star palace',
            'address' => 'Jhuma',
            'email' => 'star@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Venue',
            'file' => 'photo.png',
            'description' => 'we offer at best price with high decoration to make it special with natural environment',
       ],
        ]);
    }
}
