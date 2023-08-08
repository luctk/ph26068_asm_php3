<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test = [];
        for ($i = 1; $i < 10; $i++) {
            $test[] = [
                'name' => 'trinh khac luc',
                'gender' => 1,
                'phone' => '012345678' . $i,
                'address'=>'thanh hóa',
                'image'=>''
            ];
        }
        DB::table('students')->insert($test);
    }
}
