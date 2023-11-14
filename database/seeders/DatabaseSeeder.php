<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Editor',
            ]
        ]);

        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role_id' => 1
            ]
        ]);

        User::factory()->times(10)->create();
        Post::factory()->times(20)->create();
        Tag::factory()->times(4)->create();

        for ($i = 0; $i < 20; $i++) {
            \App\Models\PostTag::factory()->create([
                'post_id' => Post::all()->random()->id,
                'tag_id' => Tag::all()->random()->id
            ]);
        }
    }
}
