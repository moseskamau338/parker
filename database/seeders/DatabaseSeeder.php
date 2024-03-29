<?php

namespace Database\Seeders;

use App\Models\Gateway;
use App\Models\Plan;
use \App\Models\User;
use \App\Models\Customer;
use \App\Models\Rate;

use App\Models\Zone;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* =====Clear===== */
        User::truncate();
        Customer::truncate();
        Rate::truncate();
        Zone::truncate();
        Gateway::truncate();

        User::factory(10)->create();
        Customer::factory(10)->create();

        //default gateways : constant
        Gateway::create(['name'=>'MPESA']);
        Gateway::create(['name'=>'CASH']);
        Gateway::create(['name'=>'UNEXITED']);

//        Rate::factory(5)->create();

        //permissions
        $this->permissionsSeeder();

        $this->assignPermissions();

    }
    protected function permissionsSeeder()
    {
        //clear
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('model_has_roles')->truncate();
        \DB::table('model_has_permissions')->truncate();
        Role::truncate();
        Permission::truncate();
        Plan::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // create roles:
        $roles = ['cashier','manager','partner','admin'];
        foreach ($roles as $role) {
            Role::create(['name'=>$role]);
        }

        //standard plan
        $p = new Plan();
        $p->name = 'monthly';
        $p->cycle = 30; //days
        $p->rate = 2000;
        $p->save();

        //roles and functions
        $permissions = ['browse', 'edit','export', 'add','delete'];
        $module_names = ['sales', 'zones', 'users', 'customers','shifts','handovers','gateways','receipts','vehicles','permissions'];
        //permissions
        $manager_permissions = [[1,1,1,1,0],[1,1,1,1,1],[1,1,1,1,1], [1,1,1,1,1],[1,0,1,1,0],[1,0,1,1,0],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,0,0,0,0]];
        $partner_permissions = [[1,0,1,1,0],[1,1,1,1,1],[1,0,1,0,0], [1,1,1,1,1],[1,0,1,1,0],[1,0,1,1,0],[1,1,1,1,1],[1,0,1,1,0],[1,1,1,1,1],[0,0,0,0,0]];
        $cashier_permissions = [[1,1,1,1,0],[0,0,0,0,0],[0,0,0,0,0], [1,1,1,1,0],[1,0,1,1,0],[1,0,1,0,0],[1,1,1,1,1],[0,0,0,0,0],[1,1,1,
            1,1],[0,0,0,0,0]];
        $admin_permissions = [[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1]];

        //add for both API and web
        for ($j=0; $j <= count($module_names)-1; $j++) {
            for ($i=0; $i <= count($permissions)-1; $i++) {
                // create permissions
                $name = $permissions[$i].'-'.$module_names[$j];
                $permission = Permission::create(['name' => $name]);

                //give admin
                $admin = Role::where('name', 'admin')->first();
                $admin->givePermissionTo($permission);

                //cashier
                $cashier = Role::where('name', 'cashier')->first();
                if ($cashier_permissions[$j][$i]) {
                    $cashier->givePermissionTo($permission);
                }

                //partner
                $partner = Role::where('name', 'partner')->first();
                if ($partner_permissions[$j][$i]) {
                    $partner->givePermissionTo($permission);
                }

                 //manager
                $manager = Role::where('name', 'manager')->first();
                if ($manager_permissions[$j][$i]) {
                    $manager->givePermissionTo($permission);
                }
            }
        }
    }
    public function assignPermissions()
    {
        foreach (User::all()->except(1,2) as $user){
            $user->assignRole('cashier');
        }
        $admin = User::find(1);
        $admin->username = 'Mash';
        $admin->email = 'moseskamau338@gmail.com';
        $admin->save();
        $admin->assignRole('admin');

        User::find(2)->assignRole('manager');
    }
}
