<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupSeeder::class);
        $this->importRoles();
        $this->importRoles3();
        $this->importRoles2();
        $this->importRole();
        $this->importGroupRole();
        $this->call(UserSeeder::class);

    }
    public function importRoles()
    {
        $groups = [ 'User'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete','adminUpdatePass'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    } public function importRoles3()
    {
        $groups = [ 'Group'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete',];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importRoles2()
    {
        $groups = ['Category','Product'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete','viewtrash'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importRole()
    {
        $groups = ['Customer', 'Order'];
        $actions = ['viewAny', 'view'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importGroupRole()
    {
        for ($i = 1; $i <= 31; $i++) {
            DB::table('group_role')->insert([
                'group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }
}
