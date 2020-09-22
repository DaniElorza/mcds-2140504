<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    
    /*$gender = $faker->randomElement(['Female', 'Male']);  Esto no en la forma del profesor */
    $gender = $faker->randomElement($array = array('Female', 'Male')); /* Forma de Faker con el profesor */
    $photo = $faker->image('public/storage/images', 140, 140, 'people');
    if($gender == 'Female') {
        $name = $faker->firstNameFemale();
    } else {
        $name = $faker->firstNameMale();
    } 
    /*$filePath = storage_path('images');  Esto no en la forma del profesor */

    return [
        'gender'            => $gender, 
        'name'              => $name.' '.$faker->lastName(), 
        /*'name'              => $faker->firstname($gender), Esto no en la forma del profesor */
        'email'             => $faker->unique()->safeEmail,
        'phone'             => $faker->numberBetween($min = 3101000000, $max = 3202000000),
        'birthdate'         => $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-21 years', $timezone = null),
        'gender'            => $gender,
        'photo'             => substr($photo, 7), 
        /*'photo'             => 'storage/images'.$faker->image('public/storage/images', 640, 480, null, false),  Esto no en la forma del profesor */
        /*'address'           => 'Aveniu Siempre Viva', /* Esto no en la forma del profesor */
        'address'          => $faker->streetAddress(), 
        'email_verified_at' => now(),
        /* 'password'       => bcrypt('editor'), */
        'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password /* Esto no en la forma del profesor */
        'remember_token'    => Str::random(10),
    ];
});
