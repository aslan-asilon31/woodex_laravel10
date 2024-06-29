<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterData\CategoryMaster;

use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            // 1=========================================
            [
                'category_master_id' => '1',
                'cat_type_sub' => '1',//1 = cat
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Seating',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '2', 
                'cat_type_sub' => '2',//2 = sub cat
                'cat_sub_from' => '1',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Accent Chair',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '3', 
                'cat_type_sub' => '2',//2 = sub cat
                'cat_sub_from' => '1',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Barstools',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '4', 
                'cat_type_sub' => '2',//2 = sub cat
                'cat_sub_from' => '1',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Benches',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '5', 
                'cat_type_sub' => '2',//2 = sub cat
                'cat_sub_from' => '1',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Chairs',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '6', 
                'cat_type_sub' => '2',//2 = sub cat
                'cat_sub_from' => '1',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Dining chairs',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '7', 
                'cat_type_sub' => '2',//2 = sub cat
                'cat_sub_from' => '1',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Poufs & stools',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '8', 
                'cat_type_sub' => '2',//2 = sub cat
                'cat_sub_from' => '1',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Sofas',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],




            // 2=========================================
            [
                'category_master_id' => '9',
                'cat_type_sub' => '1', // 2= sub cat
                'cat_sub_from' => '9',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Tables',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '10',
                'cat_type_sub' => '2', // 2= sub cat
                'cat_sub_from' => '9',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Coffee Tables',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '11',
                'cat_type_sub' => '2', // 2= sub cat
                'cat_sub_from' => '9',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Console Tables',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '12',
                'cat_type_sub' => '2', // 2= sub cat
                'cat_sub_from' => '9',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Desks',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '13',
                'cat_type_sub' => '2', // 2= sub cat
                'cat_sub_from' => '9',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Dinig Tables',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '14',
                'cat_type_sub' => '2', // 2= sub cat
                'cat_sub_from' => '9',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Side Tables',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],





            // 3=========================================
            [
                'category_master_id' => '15',
                'cat_type_sub' => '1',
                'cat_sub_from' => '15',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Storage',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '16',
                'cat_type_sub' => '2',
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Book Cases',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '17',
                'cat_type_sub' => '2',
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Cabinets',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '18',
                'cat_type_sub' => '2',
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Dressers',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '19',
                'cat_type_sub' => '2',
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Media Units',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            
            [
                'category_master_id' => '20',
                'cat_type_sub' => '2',
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Sideboards',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            
            [
                'category_master_id' => '21',
                'cat_type_sub' => '2',
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Wall Shelving',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            
            [
                'category_master_id' => '22',
                'cat_type_sub' => '2',
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Wine Racks',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            


            // 4=========================================
            [
                'category_master_id' => '23',
                'cat_type_sub' => '1',
                'cat_sub_from' => '23',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Bed & Bath',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '24',
                'cat_type_sub' => '2',
                'cat_sub_from' => '23',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Bathroom Vanities',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '25',
                'cat_type_sub' => '2',
                'cat_sub_from' => '23',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Bathroom Accessories',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '26',
                'cat_type_sub' => '2',
                'cat_sub_from' => '23',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Bathroom Sinks',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '27',
                'cat_type_sub' => '2',
                'cat_sub_from' => '23',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Bathroom Storage',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '28',
                'cat_type_sub' => '2',
                'cat_sub_from' => '23',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Beds',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '29',
                'cat_type_sub' => '2',
                'cat_sub_from' => '23',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'bedding',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            
            [
                'category_master_id' => '30',
                'cat_type_sub' => '2',
                'cat_sub_from' => '23',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Dressers',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            
            [
                'category_master_id' => '31',
                'cat_type_sub' => '2',
                'cat_sub_from' => '23',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'HeadBoards',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            
            [
                'category_master_id' => '32',
                'cat_type_sub' => '2',
                'cat_sub_from' => '23',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'NightsStands',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            


            // 5 Lighting=========================================
            [
                'category_master_id' => '33',
                'cat_type_sub' => '1',
                'cat_sub_from' => '33',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Lighting',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '34',
                'cat_type_sub' => '2',
                'cat_sub_from' => '33',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Pendant Lights',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '35',
                'cat_type_sub' => '2',
                'cat_sub_from' => '33',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Floor Lamps',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '36',
                'cat_type_sub' => '2',
                'cat_sub_from' => '33',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Table Lamps',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '37',
                'cat_type_sub' => '2',
                'cat_sub_from' => '33',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Wall Lamps',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            


            // 6=========================================
            [
                'category_master_id' => '38',
                'cat_type_sub' => '1', 
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Decor',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '39',
                'cat_type_sub' => '2', 
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Coat Racks',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '40',
                'cat_type_sub' => '2', 
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Home Decor',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '41',
                'cat_type_sub' => '2', 
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Kitchen & Serving',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '42',
                'cat_type_sub' => '2', 
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Mirrors',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '43',
                'cat_type_sub' => '2', 
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'PLants & Planters',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '44',
                'cat_type_sub' => '2', 
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Pillows & Throws',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '45',
                'cat_type_sub' => '2', 
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Rugs',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            [
                'category_master_id' => '46',
                'cat_type_sub' => '2', 
                'cat_sub_from' => '',
                'status_id' => '1',
                'image_banner' => '',
                'name' => 'Wall Decor',
                'desc' => '',
                'desc_cat_type_sub' => '',
            ],
            
            
        ];

        // Insert data into the products table
        DB::table('category_masters')->insert($categories);
    }
}
