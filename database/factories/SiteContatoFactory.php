<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        'nome' => $faker->name(),
        'telefone' => $faker->phoneNumber,
        'motivo_contato' => $faker->numberBetween(1, 3),
        'email' => $faker->unique()->email,
        'mensagem' => $faker->text(200),
    ];
});
