<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tache;
use Faker\Generator as Faker;

$factory->define(Tache::class, function (Faker $faker) {
    return [
        'nom_tache'=>$faker->sentence(2,true),
        'description_tache'=>$faker->sentence(5,10),
        'proprietaire_tache'=>$faker->name(5,8),
        'date'=>$faker->date(),
        'image'=>$faker->image(),
    ];
});
