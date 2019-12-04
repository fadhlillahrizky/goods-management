<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Goods;
use Faker\Generator as Faker;

$factory->define(Goods::class, function (Faker $faker) {
    return [
        'NamaBarang' => $faker->unique()->text(10),
        'FotoBarang' => $faker->text(10),
        'HargaBeli' => $faker->numberBetween(1,10000000),
        'HargaJual' => $faker->numberBetween(1,10000000),
        'Stok' => $faker->numberBetween(1,100),
    ];
});
