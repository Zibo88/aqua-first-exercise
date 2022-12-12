<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Customer;
class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) { 
            $customer = new Customer();
            $customer->name = $faker->word();
            $customer->lastname = $faker->word();
            $customer->email = $faker->email();
            $customer->date_of_birth = $faker->dateTime();
            $customer->pratica_n° = $faker->randomNumber(5, false);
            $customer->descrizione = $faker->text();
            $customer->meet_date = $faker->dateTime();
            $customer->save();
        }
      
    }
}
