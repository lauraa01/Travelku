<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destination')->insert([
            ['id' => 1, 'destination_category' => 'Overseas', 'destination_origin' => 'Jakarta','destination_name' => 'Bangkok', 'destination_price' => '12360000', 'destination_duration' => '7 days Tour', 'image' => 'https://c4.wallpaperflare.com/wallpaper/403/1021/262/landscape-building-old-building-bangkok-wallpaper-preview.jpg'],
            ['id' => 2, 'destination_category' => 'Overseas', 'destination_origin' => 'Jakarta', 'destination_name' => 'Singapore', 'destination_price' => '10650000', 'destination_duration' => '4 days Tour','image' => 'https://img4.goodfon.com/wallpaper/nbig/e/84/merlion-park-singapore-singapur-fontan-gorod.jpg'],
            ['id' => 3, 'destination_category' => 'Overseas', 'destination_origin' => 'Jakarta', 'destination_name' => 'Dubai', 'destination_price' => '25300000', 'destination_duration' => '10 days Tour', 'image' => 'http://www.dubaiwikia.com/wp-content/uploads/2015/07/dubai-tours.jpg'],

            ['id' => 4, 'destination_category' => 'Domestic', 'destination_origin' => 'Jakarta', 'destination_name' => 'Makassar', 'destination_price' => '4500000', 'destination_duration' => '4 days Tour', 'image' => 'https://blog.tiket.com/wp-content/uploads/2015/09/pantai-losari-makassar-583x360.jpg'],
            ['id' => 5, 'destination_category' => 'Domestic', 'destination_origin' => 'Jakarta', 'destination_name' => 'Lombok', 'destination_price' => '6380000', 'destination_duration' => '4 days Tour', 'image' => 'https://www.pemburuombak.com/media/k2/galleries/1199/keindahan-pantai-di-pulau-lombok.jpg'],
            ['id' => 6, 'destination_category' => 'Domestic', 'destination_origin' => 'Jakarta', 'destination_name' => 'Bali', 'destination_price' => '5500000', 'destination_duration' => '3 days Tour', 'image' => 'https://lifestyle.inquirer.net/files/2013/07/t0712Y-cebpac_2.jpg'],

        ]);
    }
}
