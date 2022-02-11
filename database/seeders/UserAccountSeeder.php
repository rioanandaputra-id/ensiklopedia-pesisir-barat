<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\UserAccount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = Role::where('role', 'administrator')->first('id');
        $contributor = Role::where('role', 'contributor')->first('id');

        $users = [
            [
                'id' => Uuid::uuid4(),
                'role_id' => $administrator->id,
                'fullname' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@ensiklopedia.test',
                'password' => Hash::make('admin'),
                'active' => '1'
            ],
            [
                'id' => Uuid::uuid4(),
                'role_id' => $contributor->id,
                'fullname' => 'Contributor',
                'username' => 'user',
                'email' => 'user@ensiklopedia.test',
                'password' => Hash::make('user'),
                'active' => '1'
            ],
        ];

        foreach($users as $user){
            UserAccount::create($user);
        }
    }
}
