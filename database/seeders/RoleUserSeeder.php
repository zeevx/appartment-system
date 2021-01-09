<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        User::truncate();
        DB::table('role_user')->truncate();

        $client = Role::where('name','client')->first();
        $tenant = Role::where('name','tenant')->first();
        $senior_property_manager = Role::where('name','senior-property-manager')->first();
        $property_manager = Role::where('name','property-manager')->first();
        $facility_manager = Role::where('name','facility-manager')->first();
        $accountant = Role::where('name','accountant')->first();
        $ceo = Role::where('name','ceo')->first();
        $superadmin = Role::where('name','superadmin')->first();


        $clientUser = User::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => Hash::make('password'),
        ]);

        $tenantUser = User::create([
            'name' => 'Tenant User',
            'email' => 'tenant@example.com',
            'password' => Hash::make('password'),
        ]);

        $seniorPmUser = User::create([
            'name' => 'Senior PM User',
            'email' => 'spm@example.com',
            'password' => Hash::make('password'),
        ]);

        $pmUser = User::create([
            'name' => 'PM User',
            'email' => 'pm@example.com',
            'password' => Hash::make('password'),
        ]);

        $fmUser = User::create([
            'name' => 'FM User',
            'email' => 'fm@example.com',
            'password' => Hash::make('password'),
        ]);

        $accountantUser = User::create([
            'name' => 'Accountant User',
            'email' => 'accountant@example.com',
            'password' => Hash::make('password'),
        ]);

        $ceoUser = User::create([
            'name' => 'CEO User',
            'email' => 'ceo@example.com',
            'password' => Hash::make('password'),
        ]);

        $superadminUser = User::create([
            'name' => 'Superadmin User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
        ]);

        $clientUser->roles()->attach($client);
        $tenantUser->roles()->attach($tenant);
        $seniorPmUser->roles()->attach($senior_property_manager);
        $pmUser->roles()->attach($property_manager);
        $fmUser->roles()->attach($facility_manager);
        $accountantUser->roles()->attach($accountant);
        $ceoUser->roles()->attach($ceo);
        $superadminUser->roles()->attach($superadmin);
    }
}
