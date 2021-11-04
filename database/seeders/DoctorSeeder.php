<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            'name' => Str::random(10),
            'nric' => random_int(100000000000, 999999999999),
            'phone' => random_int(1000000000, 9999999999),
            'marital_status' => Str::random(10),
            'occupation' => random_int(1, 9),
            'birthdate' => '1999-08-08',
            'gender' => Str::random(6),
            'religion' => Str::random(10),
            'country' => Str::random(10),
            'race' => Str::random(10),
            'address_1' => Str::random(10),
            'address_2' => Str::random(10),
            'state' => Str::random(10),
            'postcode' => random_int(10000, 99999),
            'city' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
