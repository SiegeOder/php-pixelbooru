<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'SODA',
            'password' => Hash::make('SODA'),
        ]);
        $soda_profile = Profile::find(1);
        $soda_profile->image = 'users/SODA.png';
        $soda_profile->note = 'Touch mascot on homepage ;)';
        $soda_profile->save();
        $this->call([
            UserSeeder::class,
            TagSeeder::class,
        ]);
    }
}
