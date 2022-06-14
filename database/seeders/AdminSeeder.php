<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
         * Run the database seeders.
         *
         * @return void
         */
        public function run()
        {
            DB::table('users')->insert([
                'name' => 'Administrator',
                'email' => Str::random(10).'@admin.com',
                'password' => Hash::make('adminpassword'),
                'role' => 'admin',
                'email_verified_at' => date_create(),
                'birthDate' => $this->faker->dateTimeBetween('-80 years', '-18 years'),
                'adress' => $this->faker->address()
            ]);
        }
}
