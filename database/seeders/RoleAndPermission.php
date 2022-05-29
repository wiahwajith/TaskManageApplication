<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['name' => 'create quotation']);
        Permission::create(['name' => 'delete quotation']);
        Permission::create(['name' => 'edit quotation']);
        Permission::create(['name' => 'create Task']);
        Permission::create(['name' => 'delete Task']);
        Permission::create(['name' => 'edit Task']);
        Permission::create(['name' => 'create event']);
        Permission::create(['name' => 'delete event']);
        Permission::create(['name' => 'edit event']);
        Permission::create(['name' => 'add employer']);
        Permission::create(['name' => 'delete employer']);
        Permission::create(['name' => 'edit employer']);
        Permission::create(['name' => 'create project']);
        Permission::create(['name' => 'delete project']);
        Permission::create(['name' => 'edit project']);


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Super-Admin']);
        $role1->givePermissionTo('create quotation');
        $role1->givePermissionTo('delete quotation');
        $role1->givePermissionTo('edit quotation');
        $role1->givePermissionTo('create Task');
        $role1->givePermissionTo('delete Task');
        $role1->givePermissionTo('edit Task');
        $role1->givePermissionTo('create event');
        $role1->givePermissionTo('delete event');
        $role1->givePermissionTo('edit event');
        $role1->givePermissionTo('add employer');
        $role1->givePermissionTo('delete employer');
        $role1->givePermissionTo('edit employer');
        $role1->givePermissionTo('create project');
        $role1->givePermissionTo('delete project');
        $role1->givePermissionTo('edit project');


        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo('create quotation');
        $role2->givePermissionTo('delete quotation');
        $role2->givePermissionTo('edit quotation');
        $role2->givePermissionTo('create Task');
        $role2->givePermissionTo('delete Task');
        $role2->givePermissionTo('edit Task');
        $role2->givePermissionTo('create event');
        $role2->givePermissionTo('delete event');
        $role2->givePermissionTo('edit event');
        $role2->givePermissionTo('add employer');
        $role2->givePermissionTo('delete employer');
        $role2->givePermissionTo('edit employer');
        $role2->givePermissionTo('create project');
        $role2->givePermissionTo('delete project');
        $role2->givePermissionTo('edit project');


        $role3 = Role::create(['name' => 'Client']);

        $role4 = Role::create(['name' => 'Project Manager']);
        $role4->givePermissionTo('create quotation');
        $role4->givePermissionTo('create Task');
        $role4->givePermissionTo('delete Task');
        $role4->givePermissionTo('edit Task');
        $role4->givePermissionTo('create event');
        $role4->givePermissionTo('delete event');
        $role4->givePermissionTo('edit event');
        $role4->givePermissionTo('add employer');
        $role4->givePermissionTo('edit employer');
        $role4->givePermissionTo('create project');
        $role4->givePermissionTo('edit project');

        $role5 = Role::create(['name' => 'Senior Engineer']);
        $role5->givePermissionTo('create Task');
        $role5->givePermissionTo('delete Task');
        $role5->givePermissionTo('edit Task');
        $role5->givePermissionTo('create event');
        $role5->givePermissionTo('edit employer');
        $role5->givePermissionTo('create project');
        $role5->givePermissionTo('edit project');

        $role6 = Role::create(['name' => 'Business Analyst']);
        $role6->givePermissionTo('create Task');
        $role6->givePermissionTo('edit Task');

        $role7 = Role::create(['name' => 'Developer']);
        $role7->givePermissionTo('create Task');
        $role7->givePermissionTo('edit Task');

        $role8 = Role::create(['name' => 'Accountant']);
        $role8->givePermissionTo('create Task');
        $role8->givePermissionTo('edit Task');

        $role9 = Role::create(['name' => 'HR Manager']);
        $role9->givePermissionTo('create Task');
        $role9->givePermissionTo('edit Task');

        $role10 = Role::create(['name' => 'Dara Engineer']);
        $role10->givePermissionTo('create Task');
        $role10->givePermissionTo('edit Task');
        
        $role11= Role::create(['name' => 'QA Engineer']);
        $role11->givePermissionTo('create Task');
        $role11->givePermissionTo('edit Task');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create Super-Admin
        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role1);
    }
}
