<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'gelinlikAdmin',
            'password' => Hash::make('R£30!0Ht_n^)'), // Parolu burada əlavə edin
        ]);
    }
}
