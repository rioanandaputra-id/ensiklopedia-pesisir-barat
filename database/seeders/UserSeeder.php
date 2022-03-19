<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => strval(Uuid::uuid4()),
                'user_image' => '/uploads/gallery/user/default.png',
                'role' => 'Administrator',
                'name' => 'Administrator',
                'username' => 'administrator',
                'email' => 'administrator@ensiklopedia.test',
                'password' => Hash::make('administrator@ensiklopedia.test'),
                'active' => '1'
            ],
            [
                'id' => strval(Uuid::uuid4()),
                'user_image' => '/uploads/gallery/user/default.png',
                'role' => 'Contributor',
                'name' => 'Contributor',
                'username' => 'contributor',
                'email' => 'contributor@ensiklopedia.test',
                'password' => Hash::make('contributor@ensiklopedia.test'),
                'active' => '1'
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
