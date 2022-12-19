<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\{User, Product, Category, Attribute, Color, Comment};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'awirhosein',
            'email' => 'awirhosein@yahoo.com',
            'is_admin' => 1
        ]);

        User::factory(50)->create();
        Category::factory(10)->has(Attribute::factory(rand(2, 5)))->create(['parent_id' => null]);
        Category::factory(20)
            ->has(Product::factory(rand(2, 5))->has(Comment::factory()))->create();
        Color::factory(20)->create();
    }
}
