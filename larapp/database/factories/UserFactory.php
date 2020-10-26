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

    $gender = $faker->randomElement($array = array('Female', 'Male'));
    $photo = $faker->image('public/imgs', 140, 140, 'people');

    if($gender == 'Female') {
        $name = $faker->firstNameFemale();
    } else {
        $name = $faker->firstNameMale();
    }

    return [
        'gender'            => $gender,
        'name'              => $name.' '.$faker->lastName(),
        'email'             => $faker->unique()->safeEmail,
        'phone'             => $faker->numberBetween($min = 3101000000, $max = 3202000000),
        'birthdate'         => $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-21 years'),
        'address'          => $faker->streetAddress(),
        'photo'             => substr($photo, 7),
        'email_verified_at' => now(),
        'password'       => bcrypt('editor'),
        'remember_token'    => Str::random(2),
    ];
});
