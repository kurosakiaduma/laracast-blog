<?php

namespace Database\Seeders;

//use Database\Factories\ // Import the RoleFactory


use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $adminRole = Role::factory()->create(['name' => 'admin']);
        $userRole = Role::factory()->create(['name' => 'user']);
        $writerRole = Role::factory()->create(['name' => 'writer']);

        // Create an admin user
        $adminUser = User::factory()->create([
            'username' => 'tevinaduma',
            'name' => 'Tevin Joel Aduma',
            'email' => 'tev@aduma.com',
        ]);
        $adminUser->roles()->attach($adminRole->id);

        // Create regular users and assign the user or writer roles
        $users = User::factory(5)->create(['password' => '@Octo808']);
        foreach ($users as $user) {
            $randomRole = $this->getRandomRole([$userRole->id, $writerRole->id]);
            $user->roles()->attach($randomRole);

            Post::factory(5)->create([
                'user_id' => $user->id
            ]);
        }
    }

    private function getRandomRole($roles)
    {
        return $roles[array_rand($roles)];
    }
}
