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

        DB::table('permissions')->truncate();
        DB::table('permissions')->insert([
            ['name' => 'add_post'],
            ['name' => 'edit_post'],
            ['name' => 'delete_post'],
            ['name' => 'detail_user'],
            ['name' => 'add_user'],
            ['name' => 'edit_user'],
            ['name' => 'delete_user'],
        ]);

        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            [
                'name' => 'admin',
            ],
            [
                'name' => 'editor',
            ]
        ]);

        DB::table('permission_role')->truncate();
        DB::table('permission_role')->insert([
            ['permission_id' => 1, 'role_id' => 1], // admin: add_post
            ['permission_id' => 2, 'role_id' => 1], // admin: edit_post
            ['permission_id' => 3, 'role_id' => 1], // admin: delete_post
            ['permission_id' => 4, 'role_id' => 1], // admin: detail_user
            ['permission_id' => 5, 'role_id' => 1], // admin: add_user
            ['permission_id' => 6, 'role_id' => 1], // admin: edit_user
            ['permission_id' => 7, 'role_id' => 1], // admin: delete_user
            ['permission_id' => 1, 'role_id' => 2], // editor: add_post
            ['permission_id' => 2, 'role_id' => 2], // editor: edit_post
        ]);

        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role_id' => 1
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@gmail.com',
                'password' => bcrypt('editor123'),
                'role_id' => 2
            ],
            [
                'name' => 'Editor1',
                'email' => 'editor1@gmail.com',
                'password' => bcrypt('editor123'),
                'role_id' => 2
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
