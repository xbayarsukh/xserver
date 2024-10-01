<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UsersTableSeeder::class);
        $this->call(ArrivalDepartureSeeder::class);
         $this->call(CorpsTableSeeder::class);
    $this->call(OfficesTableSeeder::class);
    $this->call(UsersTableSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $admin = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@yahoo.com',
        //     'password' => bcrypt('12138888'),
        // ]);

        // // Assign the admin role to the admin user
        // $admin->assignRole('admin');
    }
}
