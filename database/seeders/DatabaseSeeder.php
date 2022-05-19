<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories=Category::factory(5)->create();/* Création de 5 categories */

        User::factory(10)->create()->each(function($user) use ($categories) { /* Création de 10 utilisateurs -> pour chaque utilisateur grace à la fonction "each"-> */
            Post::factory(rand(1, 3))->create([ /*  on fait un postfactory -> on creera entre 1 et 3 posts */
                    'user_id'=>$user->id, /* Création de "user_id" et "category_id" */
                    'category_id'=> ($categories->random(1)->first())->id /* Récuperation random des "category"-> recuperation de la première --> recuperation de l'id */
            ]);
        });
    }
}
