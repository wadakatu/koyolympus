<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Models\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'id' => Str::random(12),
        'file_name' => 'factory.jpeg',
        'file_path' => '/photo/factory',
        'genre' => 1,
        'created_at' => $faker->dateTime
    ];
});
