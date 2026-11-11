<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class MarketplaceSeeder extends Seeder
{
    public function run(): void
    {
        // Admin (ganti password setelah deploy!)
        User::create([
            'nama' => 'Admin Kampus',
            'email' => 'admin@kampus.ac.id',
            'password' => 'admin12345',
            'role' => 'admin',
        ]);
    }
}
