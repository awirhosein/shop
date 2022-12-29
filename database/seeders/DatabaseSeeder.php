<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\{User, Product, Category, Attribute, Color, Comment, Question};

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

        User::factory(100)->create();
        Color::factory(30)->create();

        Category::factory(10)
            ->hasAttributes(10)
            ->has(
                Category::factory(10)
                    ->has(
                        Product::factory(5)
                            ->hasComments(6)
                            ->has(
                                Question::factory(5)
                                    // ->hasAnswers(2)
                            )
                    ),
                'children'
            )
            ->create();
    }
}
