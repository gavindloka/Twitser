<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
 * Run the database sees.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(20)->create();
    }
}
