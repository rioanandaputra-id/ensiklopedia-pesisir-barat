<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => Uuid::uuid4(), 'role' => 'Administrator'],
            ['id' => Uuid::uuid4(), 'role' => 'Contributor']
        ];

        foreach($roles as $role){
            Role::insert($role);
        }
    }
}
