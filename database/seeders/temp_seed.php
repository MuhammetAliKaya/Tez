<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class temp_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i_array = [1, 2, 3, 4, 5, 6, 7, 8, 9];

        $now = Carbon::now();
        $nowPlus5Minutes = $now->addMinutes(5);
        foreach ($i_array as $key => $value) {
            $nowPlus5Minutes = $now->addMinutes(5 * $key);
            DB::table('temp_records')->insert(['created_at' => $nowPlus5Minutes, 'machine' => 'test', 'temparature' =>  rand(20, 30), 'humidity' => 60]);
        }
    }
}
