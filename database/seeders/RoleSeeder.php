<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            ['name' => 'Admin'],
            ['name' => 'Clied'],
        ];


        foreach($role as $value) {
            Role::insert(['name' => $value['name']]);
        }
    }
}
