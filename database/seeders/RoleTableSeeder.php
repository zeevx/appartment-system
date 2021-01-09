<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Role::truncate();

        Role::create(['name'=>'client']);
        Role::create(['name'=>'tenant']);
        Role::create(['name'=>'facility-manager']);
        Role::create(['name'=>'senior-property-manager']);
        Role::create(['name'=>'property-manager']);
        Role::create(['name'=>'accountant']);
        Role::create(['name'=>'ceo']);
        Role::create(['name'=>'superadmin']);
    }
}
