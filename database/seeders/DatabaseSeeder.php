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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Editor',
            ]
        ]);

        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role_id' => 1
            ]
        ]);

        DB::table('users')->truncate();
        User::factory()->times(10)->create();

        DB::table('posts')->truncate();
        Post::factory()->times(20)->create();

        DB::table('tags')->truncate();
        Tag::factory()->times(4)->create();

        DB::table('post_tag')->truncate();
        for ($i = 0; $i < 20; $i++) {
            \App\Models\PostTag::factory()->create([
                'post_id' => Post::all()->random()->id,
                'tag_id' => Tag::all()->random()->id
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
