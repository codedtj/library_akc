<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Library\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sultonazar Mamadazizov',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), // password
            'remember_token' => Str::random(10),
        ])->roles()->sync(Role::where('name', 'admin')->first());

        User::factory(100)->create();
    }
}
