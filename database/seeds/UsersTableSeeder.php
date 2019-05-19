<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => ($i === 0) ? 'admin@admin.com' : $faker->email,
                'password' => bcrypt('secret'),
                'phone' => $faker->phoneNumber,
                'confirmed' => ($i<3) ? 0 : 1,
                'avatar' => 'http://lorempixel.com/640/480/',
                'header' => 'http://lorempixel.com/1200/680/',
                'role' => ($i === 0) ? 'admin' :'user',
                'referer_code' => $faker->swiftBicNumber,
            ]);
        }
    }
}
