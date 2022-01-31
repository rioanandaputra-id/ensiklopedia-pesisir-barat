<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = DB::table('roles')->select('role_id')->where('name', 'Administrator')->first();
        $contributor = DB::table('roles')->select('role_id')->where('name', 'Contributor')->first();

        $users = [
            [
                'user_id' => Uuid::uuid4(),
                'role_id' => $administrator->role_id,
                'image_path' => 'https://via.placeholder.com/640x480.png/0022aa?text=Administrator',
                'image_uploded' => false,
                'fullname' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@ensiklopedia.test',
                'password' => Hash::make('admin'),
                'active' => '1'
            ],
            [
                'user_id' => Uuid::uuid4(),
                'role_id' => $contributor->role_id,
                'image_path' => 'https://via.placeholder.com/640x480.png/0022aa?text=Contributor',
                'image_uploded' => false,
                'fullname' => 'Contributor',
                'username' => 'user',
                'email' => 'user@ensiklopedia.test',
                'password' => Hash::make('user'),
                'active' => '1'
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
