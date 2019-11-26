<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\emp_model::class, function (Faker $faker) {
    
    return [
         //'id' => $faker->unique()->randomDigit,
            'emp_name'  => $faker->name,
            'emp_email' => $faker->unique()->safeEmail,
            
            'emp_description' => $faker->word,
            
            'emp_phone' => $faker->phoneNumber,
    ];
});