<?php
use App\User;
use App\messanger;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'avatar'=>$faker->avatar,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\messanger::class, function (Faker\Generator $faker) {
    do {
        $user_requested_id = rand(1, 30);
        $acceptor_id = rand(1, 30);
        $status = rand(0, 1);
    } while ($user_requested_id === $acceptor_id);

    return [
        'user_requested_id' => $user_requested_id,
         'acceptor_id'=>$acceptor_id,
        'message' => $faker->sentence,
        'status'=>$status,
    ];
});
