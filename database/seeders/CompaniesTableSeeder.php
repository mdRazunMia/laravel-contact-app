<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $companies = [
            [
                "name"=> "Md. Razun Mia",
                "address"=> "Muktagacha",
                "website"=> "www.hello.com",
                "email"=> "razun.neub.cse@gmail.com",
                "created_at"=> now(),
                "updated_at"=> now()
            ],
            [
                "name"=> "Md. Razun Mia",
                "address"=> "Muktagacha",
                "website"=> "www.hello.com",
                "email"=> "razun.neub.cse@gmail.com",
                "created_at"=> now(),
                "updated_at"=> now()
            ],
             [
                "name"=> "Md. Razun Mia",
                "address"=> "Muktagacha",
                "website"=> "www.hello.com",
                "email"=> "razun.neub.cse@gmail.com",
                 "created_at"=> now(),
                "updated_at"=> now()
            ],
        ];
        DB::table('companies')->insert($companies);
    }
}
