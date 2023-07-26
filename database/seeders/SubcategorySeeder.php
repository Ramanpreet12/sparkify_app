<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use Carbon;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategoryRecords = [
            ['id' => 1 ,'categories_id' => 1 ,  'name' => 'occupation name' , 'status' => 'active' ,
            'created_at' => \Carbon\Carbon::now() , 'updated_at' =>\Carbon\Carbon::now()]
        ];
        SubCategory::insert($subCategoryRecords);
    }
}
