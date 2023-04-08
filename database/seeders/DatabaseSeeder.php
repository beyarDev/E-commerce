<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Database\Seeders\ProductSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $categories = [
            "mobile", "laptop", "tv", "keyboards"
        ];

        foreach ($categories as $category) {
            DB::table('category')->insert([
                'name' => $category,
            ]);
        };
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
    }
}




 // foreach (range(0, 50) as $category) {
        //     DB::table('products')->insert([
        //         'name' => fake()->name(),
        //         'description' => fake()->text(100),
        //         'image_url' => fake()->image(),
        //         'price' => fake()->numberBetween(0, 1000),
        //         'category_id' => fake()->numberBetween(1, 3)
        //     ]);
        // };


          // foreach (range(0, 10) as $number) {
        //     DB::table('users')->insert([
        //         'name' => Str::random(10),
        //         'email' => Str::random(10) . '@gmail.com',
        //         'password' => Hash::make('password'),
        //     ]);
        // };