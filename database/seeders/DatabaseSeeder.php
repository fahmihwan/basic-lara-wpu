<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory(3)->create();

        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10) . '@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        // User::create([
        //     'name' => 'Fahmi Ichwanurrohman',
        //     'email' => 'fahmiiwan86@gmail.com',
        //     'password' => bcrypt('12345'),
        // ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',

        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quia eos adipisci dolor perferendis totam quasi nam earum quos, voluptatibus eaque quis quae dicta blanditiis porro iusto labore at hic.    ',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quia eos adipisci dolor perferendis totam quasi nam earum quos, voluptatibus eaque quis quae dicta blanditiis porro iusto labore at hic. ',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
    }
}
