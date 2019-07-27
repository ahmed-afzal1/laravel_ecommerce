<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->company,
        'image'=>'uploads/products/book.png',
        'price'=>$faker->numberBetween(100,1000),
        'description'=>$faker->paragraph(4),
    ];
});
