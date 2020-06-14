<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(rand(1,2)),
        'price' => $faker->randomFloat(2,1, 1000),
        'description' => $faker->sentence(rand(3,6)),
    ];
});
