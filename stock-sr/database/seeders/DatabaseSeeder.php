<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Stock;
use App\Models\Category;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // USERS
        User::create([
            'name'                  => 'Riandalis Purnama Deva',
            'username'              => 'riandalis',
            'email'                 => 'riandalis4@gmail.com',
            'password'              => bcrypt('password'),
            'password_confirmation' => bcrypt('password')
        ]);
        User::factory(3)->create();

        // CATEGORIES
        Category::create([
            'name'  => 'Handphone',
            'slug'  => 'handphone'
        ]);
        Category::create([
            'name'  => 'Televisi',
            'slug'  => 'televisi'
        ]);

        // POSTS
        Post::factory(5)->create();

        // STOCKS
        Stock::factory(5)->create();

    }
}
