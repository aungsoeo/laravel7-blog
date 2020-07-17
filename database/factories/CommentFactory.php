<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        "article_id"=>rand(1,20),
        "user_id"=>rand(1,2),
        "content"=>$faker->paragraph
    ];
});
