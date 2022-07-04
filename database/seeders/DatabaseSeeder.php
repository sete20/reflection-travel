<?php

namespace Database\Seeders;

use App\Domain\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolesSeeder::class);
        $this->call(StaticPagesSeeder::class);
        $this->call(FullSeeder::class);
        $user = User::updateOrCreate([
            'name'     => 'hisham',
            'email'    => 'admin1@admin.com',
        ], [
            'password' => Hash::make('123456'),
        ]);
        $user->assignRole('super-admin');
        $user->assignRole('admin');

        echo 'Admins Created Successfully' . PHP_EOL;
    }
}
