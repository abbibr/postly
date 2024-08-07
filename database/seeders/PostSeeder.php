<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* DB::table('posts')->insert([
            'user_id' => 7,
            'body' => Str::random(25),
            'created_at' => \Carbon\Carbon::now()
        ]); */

        Post::factory(50)->create();
    }
}
