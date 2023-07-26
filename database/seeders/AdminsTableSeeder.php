<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;
use Carbon;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $password = Hash::make('admin@123');
        $adminRecords = [
            ['id' => 1 , 'name' => 'admin' , 'email' => 'admin@123' , 'password' => '$2a$12$Db3WfGaz3w1xQyPv4jjjmeTGAXAF.Hn7OczSc3pRxPzLoAQb65fFe' ,
            'mobile'=> 1234556789 , 'image' => '' ,'type' => 'admin' , 'status' => 'active' ,
             'created_at' => \Carbon\Carbon::now() , 'updated_at' =>\Carbon\Carbon::now() ]
        ];
        Admin::insert($adminRecords);
    }
}
