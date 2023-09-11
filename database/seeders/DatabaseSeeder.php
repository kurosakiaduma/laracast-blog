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
    public function run(): void
    {
        // Create roles using the RoleFactory
        $adminRole = Role::factory()->create(['name' => 'admin']);
        $userRole = Role::factory()->create(['name' => 'user']);
        $writerRole = Role::factory()->create(['name' => 'writer']);

        // Create an admin user and assign the admin role
        $admin = User::factory()->create([
            "username" => "tevinaduma",
            "name" => "Tevin Joel Aduma",
            "email" => "tev@aduma.com",
        ]);
        $admin->roles()->attach($adminRole->id);

        // Create regular users and assign the user or writer roles
        $users = User::factory(5)->create(['password' => "@Octo808"]);
        foreach ($users as $user) {
            $randomRole = $this->faker->randomElement([$userRole->id, $writerRole->id]);
            $user->roles()->attach($randomRole);

            Post::factory(5)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
