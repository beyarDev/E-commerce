<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $tracker = -1;
    public $prducts = [
        "Apple MacBook Pro",
        "Dell XPS 13",
        "HP Spectre x360",
        "Lenovo ThinkPad X1 Carbon",
        "Asus ZenBook UX425",
        "Acer Swift 3",
        "Microsoft Surface Laptop 3",
        "Razer Blade Stealth",
        "LG Gram 17",
        "MSI GS66 Stealth",
        "Alienware m15 R4",
        "HP Omen 15",
        "Lenovo Legion 5",
        "ASUS ROG Zephyrus G14",
        "Dell G5 15 Gaming Laptop",
        "Acer Predator Triton 300",
        "MSI GE75 Raider",
        "Gigabyte Aorus 15G",
        "Razer Blade 15 Advanced",
        "Asus TUF Gaming A15",
        "Lenovo IdeaPad 5",
        "HP Envy x360",
        "Samsung Galaxy Book Pro",
        "Google Pixelbook Go",
        "Huawei MateBook X Pro",
        "LG Gram 16",
        "Acer Chromebook Spin 713",
        "ASUS Chromebook Flip C434",
        "Lenovo Chromebook Duet",
        "HP Chromebook x360",
        "Microsoft Surface Laptop Go",
        "Apple iPhone 13",
        "Samsung Galaxy S21",
        "OnePlus 9 Pro",
        "Google Pixel 6",
        "Xiaomi Mi 11",
        "Sony Xperia 1 III",
        "LG Velvet",
        "Motorola Edge 20",
        "Nokia X20",
        "Asus ROG Phone 5",
        "Apple iPhone SE (2020)",
        "Samsung Galaxy A52",
        "OnePlus Nord",
        "Google Pixel 4a",
        "Xiaomi Redmi Note 10 Pro",
        "Sony Xperia 5 II",
        "LG Wing",
        "Motorola Moto G Power",
        "Apple MacBook Air"
    ];
    public function definition(): array
    {
        $this->tracker += 1;
        return [
            'name' => $this->prducts[$this->tracker],
            'description' => fake()->sentence(35),
            'image_url' => "https://picsum.photos/id/" . strval(rand(1, 40)) . "/200/300",
            'price' => fake()->numberBetween(0, 1000),
            'category_id' => fake()->numberBetween(1, 3),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
