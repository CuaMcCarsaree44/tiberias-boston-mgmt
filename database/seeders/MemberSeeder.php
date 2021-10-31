<?php

namespace Database\Seeders;

use App\Models\Entity\Member;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i < 1000; $i++){
            $member = new Member();

            $member->name = $faker->name;
            $member->regency_id = $faker->numberBetween(1100, 1110);
            $member->district_id = 1101010;
            $member->address = $faker->address;
            $member->kk_flag = $faker->numberBetween(0, 1);
            $member->akte_baptis_flag = $faker->numberBetween(0, 1);
            $member->save();
        }
    }
}
