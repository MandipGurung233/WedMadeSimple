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
                'file' => 'ShantiMakeup.pdf',
                'description' => 'One stop solution for all your make up offering both home and studio service with 2 years of experience',
                'img' => 'makeup1.jpg',
           ],
            [
                'name' => 'Niraj Make Up',
                'address' => 'Dharan',
                'email' => 'tamu0057@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Make Up',
                'file' => 'niraj.pdf',
                'description' => 'Offers multiple make up as per customer demands with both home and studio service',
                'img' => 'makeup2.jpg',
      
            ],
            [
                'name' => 'Rishi Make Up',
                'address' => 'Dharan',
                'email' => 'rishi@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Make Up',
                'file' => 'RishiMakeup.pdf',
                'description' => 'Get all your make up need with best price and get both home as well as studio service',
                'img' => 'makeup3.jpg',
            ],
            [
                'name' => 'Hancy Make Up',
                'address' => 'Dharahara',
                'email' => 'hancy@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Make Up',
                'file' => 'HancyMakeup.pdf',
                'description' => 'Make up makes you looks good so book it at best price with both home and studio service',
                'img' => 'makeup4.jpg',
            ],
            [
                'name' => 'Hancy kto Make Up',
                'address' => 'Dharahara',
                'email' => 'kto@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Make Up',
                'file' => 'HancyKtoMakeup.pdf',
                'description' => 'Hancy Make up makes you looks confidence so book it with both service as per demands',
                'img' => 'makeup5.jpg',
            ],
            
            [
                'name' => 'Darpan Bhojan',
                'address' => 'Tarahara',
                'email' => 'darpan@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Venue',
                'file' => 'DarpanMakeup.pdf',
                'description' => 'Darapan palace offers best venue with asthetic environment to make your day special at best price',
                'img' => 'venue1.jpg',
            ],
            [
                'name' => 'Rcity palace',
                'address' => 'Jhumka',
                'email' => 'rcity@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Venue',
                'file' => 'RcityPalace.pdf',
                'description' => 'Our venue offers an asthetic and decorative environment to make your moment memorable',
                'img' => 'venue2.jpg',
          
            ],
            [
                'name' => 'Simple palace',
                'address' => 'Jhumki',
                'email' => 'simple@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Venue',
                'file' => 'SimplePalace.pdf',
                'description' => 'Our simple venue offers an asthetic environment to cherish your moment',
                'img' => 'venue3.jpg',
          
            ],
            [
                'name' => 'Indra palace',
                'address' => 'Jhuma',
                'email' => 'indra@gmail.com',
                'password' => 'mandip',
                'vendorType' => 'Venue',
                'file' => 'IndraPalace.pdf',
                'description' => 'With one hundred customer satisfaction we offer at best price best venue with high decoration to make your program special',
                'img' => 'venue4.jpg',
           ],
           [
            'name' => '3 star palace',
            'address' => 'Jhuma',
            'email' => 'star@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Venue',
            'file' => 'StarPalace.pdf',
            'description' => 'we offer at best price with high decoration to make it special with natural environment',
            'img' => 'venue5.jpg',
       ],
        [
            'name' => 'Feel Photo',
            'address' => 'Taplejung',
            'email' => 'feel@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Photography',
            'file' => 'photo1.pdf',
            'description' => 'Feel photography studio makes you feel good with awesome pictures at good price with professional expert',
            'img' => 'photo1.jfif',
        ],
        [
            'name' => 'Color Photo',
            'address' => 'Hile',
            'email' => 'color@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Photography',
            'file' => 'photo2.pdf',
            'description' => 'Color photography studio makes you feel good by providing you with amazing photos at a reasonable price, all while working with a skilled specialist',
            'img' => 'photo2.jfif',
        ],
        [
            'name' => 'Wedding Photography',
            'address' => 'lalitpur',
            'email' => 'wedding@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Photography',
            'file' => 'photo3.pdf',
            'description' => 'Wedding studio is one of the best with awesome pictures taken at good price',
            'img' => 'photo3.jfif',
        ],
        [
            'name' => 'Bhakta Photo',
            'address' => 'Bhaktapur',
            'email' => 'bhakta@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Photography',
            'file' => 'photo4.pdf',
            'description' => 'Bhakta photo studio is all yours at best price with awesome pictures taken by the professional',
            'img' => 'photo4.jfif',
        ],
        [
            'name' => 'Sani Photo',
            'address' => 'Taplejung',
            'email' => 'sani@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Photography',
            'file' => 'photo5.pdf',
            'description' => 'Sani photo studio is one of the best studio with good pictures quality and awesome working team and professional',
            'img' => 'photo5.jfif',
        ],
        [
            'name' => 'Raju Cloth',
            'address' => 'Tarahara',
            'email' => 'raju@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Clothing',
            'file' => 'cloth1.pdf',
            'description' => 'Raju clothing store is one of the best store you can afford at fashinable rate',
            'img' => 'cloth1.jpg',
        ],
        [
            'name' => 'Nepali Cloth',
            'address' => 'dulari',
            'email' => 'nepali@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Clothing',
            'file' => 'cloth2.pdf',
            'description' => 'at fashionable rate you can be fashionable at nepali cloth store',
            'img' => 'cloth2.jfif',
        ],
        [
            'name' => 'Gurung Cloth',
            'address' => 'jhumka',
            'email' => 'gurung@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Clothing',
            'file' => 'cloth3.pdf',
            'description' => 'Be the next desire man with gurung cloth studio and be fashionable',
            'img' => 'cloth3.jfif',
        ],
        [
            'name' => 'Dami Cloth',
            'address' => 'khanar',
            'email' => 'dami@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Clothing',
            'file' => 'cloth4.pdf',
            'description' => 'Dami cloth is one of the best and nicest store to be fashionable',
            'img' => 'cloth4.jpg',
        ],
        [
            'name' => 'Fashion Cloth',
            'address' => 'halgada',
            'email' => 'fashion@gmail.com',
            'password' => 'mandip',
            'vendorType' => 'Clothing',
            'file' => 'cloth5.pdf',
            'description' => 'Fashion cloth store can be your gateway to be fashinable at fashionable rate',
            'img' => 'cloth5.jpg',
        ],
        ]);
    }
}



