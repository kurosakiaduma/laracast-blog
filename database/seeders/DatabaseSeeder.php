<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create(
            [
            "username" => "tevinaduma",
                "name" => "Tevin Joel Aduma",
                "email" => "tev@aduma.com",
            ]);

        $users = User::factory(5)->create(['password'=>"@Octo808"]);
        foreach ($users as $user){
            Post::factory(5)->create([
                'user_id' => $user->id
            ]);
        }

    }
}
