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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
    
        'name' => $faker->name,
        'email' => $faker->unique()->email,       
        'nation_abbr' => 'VNM',
        'password' => 'secret',
        'remember_token' => str_random(10)
    ];
});



$factory->define(App\Models\Job::class, function (Faker\Generator $faker) {
   
    return [
        'name' => $faker->name,
        'holder_id'    => function() {
            return factory(App\User::class)->create()->id;
        },
        'requirement' => $faker->paragraph,
        'from_date' => $faker->date,
        'to_date' => $faker->date,
        'status' => 'active',
        'bid_status' => NULL
       
    ];
});



$factory->define(App\Models\Nation::class, function (Faker\Generator $faker) {
 
    return [
        'name' => $faker->country,
        'abbr' => $faker->name
        
    ];
});

$factory->define(App\Models\Project::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'job_id'    => function() {
            return factory(App\Models\Job::class)->create()->id;
        },
        'client_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'description' => $faker->paragraph,
       
       
    ];
});

$factory->define(App\Models\Section::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'job_id'    => function() {
            return factory(App\Models\Job::class)->create()->id;
        },
        'project_id' => function() {
            return factory(App\Models\Project::class)->create()->id;
        }
        
       
    ];
});

$factory->define(App\Models\Package::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'job_id'    => function() {
            return factory(App\Models\Job::class)->create()->id;
        },
        'section_id' => function() {
            return factory(App\Models\Section::class)->create()->id;
        }
        
       
    ];
});




