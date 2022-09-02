<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => bcrypt('12345678'),
            'role_as' => 'user'
        ]);

        // User
        $user = new User();
        $user->name = "User";
        $user->email = "user@mail.com";
        //$user->profile_photo = "backend/user/default.png";
        $user->password = bcrypt('12345678');
        $user->role_as = 'user';
        $user->phone = '01811287256';
        $user->email_verified_at = Carbon::now();
        $user->remember_token = Str::random(10);
        $user->save();

        //Admin
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@mail.com";
        // $user->profile_photo = "backend/user/default.png";
        $user->password = bcrypt('12345678');
        $user->role_as = 'admin';
        $user->phone = '01711287256';
        $user->email_verified_at = Carbon::now();
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
