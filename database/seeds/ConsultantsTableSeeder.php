<?php

use Illuminate\Database\Seeder;
use App\Consultant;

class ConsultantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Consultant::truncate();

        $faker = Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Consultant::create([
                'name' => $faker->name,
                'email' => $faker->email,
            ]);
        }
    }
}
