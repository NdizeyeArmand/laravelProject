<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create();
        User::factory()->create([
            'name' => 'admin',
            'email' => env('ADMIN_EMAIL', 'admin@example.com')
            'password' => bcrypt(env('ADMIN_PASSWORD', 'changeme')),
            'avatar' => null,
            'is_admin' => true,
        ]);
        $this->call([
            TagSeeder::class,
            PostSeeder::class,
            FaqCategorySeeder::class,
            FaqItemSeeder::class,
        ]);
    }
}
