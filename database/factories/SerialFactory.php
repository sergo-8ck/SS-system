<?php

use Faker\Generator as Faker;
use App\Entity\Serials;
use Carbon\Carbon;
use Illuminate\Support\Str;

$factory->define(Serials::class, function (Faker $faker) {

  return [
//    'serial' => $faker->numberBetween(100000, 999999),
//      'serial' => $faker->randomElements(['A', 'B', 'C', 'D']),
//    'serial' => $faker->randomElements(["PHP", "Laravel", "MySQL", "VueJS", "JavaScript"], rand(2,4)),

      "serial" => $faker->randomElement(range('A', 'Z')) . $faker->randomElement(range('A', 'Z')) . ' ' . $faker->numberBetween(100000, 999999),
    ];
});
