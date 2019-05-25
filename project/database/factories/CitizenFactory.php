<?php

use Faker\Generator as Faker;

$factory->define(\App\Citizen::class, function (Faker $faker) {
    $gender = $faker->randomElements($array = array('Male', 'Female'), $count = 1);
    return [
        'name' => (string)$faker->firstNameMale,
        'surname' => (string)$faker->lastName,
        'father_name' => (string)$faker->firstNameMale,
        'mother_name' => (string)$faker->firstNameFemale,
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender' => 'Male',
        'personal_no' => (string)$faker->regexify('[A-Z]\d{7}[A-Z]'),
        'maritial_status' => 'single',
        'wanted' => '0',
        'address' => $faker->city,
        'birthplace' => $faker->city,
        'mobile' => $faker->phoneNumber,
    ];
});
