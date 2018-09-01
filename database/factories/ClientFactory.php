<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
    	'name' => $faker->firstName,
		'lastname' => $faker->lastname,
		'position' => $faker->jobTitle,
		'company' => $faker->company,
		'phone' => $faker->tollFreePhoneNumber,
		'email' => $faker->safeEmail,
    ];
});
