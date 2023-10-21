<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(16)->create([
            'image_url' => $this->getImageUrl(),
        ]);
    }

    private function getImageUrl()
    {
        return 'uploads/' . rand(1, 16) . '.png';
    }
}
