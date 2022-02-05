<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'title' => $this->faker->text(30),
        'image' => $this->faker->imageUrl()
    ];
});
