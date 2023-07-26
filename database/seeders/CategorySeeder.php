<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecords = [
            ['id' => 1 , 'name' => 'occupation name' , 'status' => 'active' ,
            'created_at' => \Carbon\Carbon::now() , 'updated_at' =>\Carbon\Carbon::now()]
        ];
        Category::insert($categoryRecords);
    }
}
