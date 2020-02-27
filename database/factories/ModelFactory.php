<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role_id'=>$faker->numberBetween(1,3),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,8),
        'photo_id' => 1,
        'title' => $faker->numberBetween(7,11),
        'body' => $faker->paragraph(rand(10,15),true)
    ];
});

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['administrator','autor','subscriber']),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['PHP','Programming','JavaScript','Life','Travel']),
    ];
});

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'file' => 'WS000033-4.jpg'
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1,10),
        'is_active' => 1,
        'author' => $fake->name,
        'photo' => 'WS000033-4.jpg',
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1,true), // password
    ];
});

$factory->define(App\CommentReply::class, function (Faker $faker) {
    return [
        'is_active' => 1,
        'author' => $faker->name,
        'photo' => 'WS000033-4.jpg',
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1,true), // password
    ];
});
