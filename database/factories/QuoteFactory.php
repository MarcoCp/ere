<?php

use Faker\Generator as Faker;

$factory->define(App\Quote::class, function (Faker $faker) {
    return [
    	'user_id' => 1,
        'client_id' => factory(App\Client::class)->create()->id,
		'date' => $faker->date('Y-m-d','now'),
		'project' => $faker->firstName('male'),
		'budget' => $faker->numberBetween(250,6000),
    ];
});
