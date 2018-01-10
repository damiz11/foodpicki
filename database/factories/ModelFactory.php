<?php

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
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'status'    => 1,
        'role_id'   => 1,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Food\MenuFood\MenuFood::class,function (Faker\Generator $faker){
    return [
        'name'  => $faker->word,
        'price' => $faker->randomNumber(3),
        'description'   => $faker->paragraph,
        'details'   => $faker->paragraph,
        'nutrition_info'    => $faker->paragraph,
        'prep_methods'  => $faker->paragraph,
        'weight'    => $faker->randomNumber(2),
        'calories'  => $faker->randomNumber(2),
        'ingredients'   => $faker->paragraph,
        'discount'  => $faker->randomNumber(1),
    ];
});

$factory->define(\App\Food\Category\Category::class,function (Faker\Generator $faker){
    $dish = $faker->unique()->randomElement( [
        'meat','chicken','fish','vegetarians and vegans'
    ]);

    return [
        'name'      => $dish,
        'slug'      => str_slug($dish,'-'),
        'details'   => $faker->paragraph,
        'description'  => $faker->paragraph,
        'parent'    => 1,

    ];
});