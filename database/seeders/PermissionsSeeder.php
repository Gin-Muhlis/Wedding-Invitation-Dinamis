<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list albums']);
        Permission::create(['name' => 'view albums']);
        Permission::create(['name' => 'create albums']);
        Permission::create(['name' => 'update albums']);
        Permission::create(['name' => 'delete albums']);

        Permission::create(['name' => 'list faqs']);
        Permission::create(['name' => 'view faqs']);
        Permission::create(['name' => 'create faqs']);
        Permission::create(['name' => 'update faqs']);
        Permission::create(['name' => 'delete faqs']);

        Permission::create(['name' => 'list fiturs']);
        Permission::create(['name' => 'view fiturs']);
        Permission::create(['name' => 'create fiturs']);
        Permission::create(['name' => 'update fiturs']);
        Permission::create(['name' => 'delete fiturs']);

        Permission::create(['name' => 'list testimonies']);
        Permission::create(['name' => 'view testimonies']);
        Permission::create(['name' => 'create testimonies']);
        Permission::create(['name' => 'update testimonies']);
        Permission::create(['name' => 'delete testimonies']);

        Permission::create(['name' => 'list websites']);
        Permission::create(['name' => 'view websites']);
        Permission::create(['name' => 'create websites']);
        Permission::create(['name' => 'update websites']);
        Permission::create(['name' => 'delete websites']);

        Permission::create(['name' => 'list bridegrooms']);
        Permission::create(['name' => 'view bridegrooms']);
        Permission::create(['name' => 'create bridegrooms']);
        Permission::create(['name' => 'update bridegrooms']);
        Permission::create(['name' => 'delete bridegrooms']);

        Permission::create(['name' => 'list catgories']);
        Permission::create(['name' => 'view catgories']);
        Permission::create(['name' => 'create catgories']);
        Permission::create(['name' => 'update catgories']);
        Permission::create(['name' => 'delete catgories']);

        Permission::create(['name' => 'list comments']);
        Permission::create(['name' => 'view comments']);
        Permission::create(['name' => 'create comments']);
        Permission::create(['name' => 'update comments']);
        Permission::create(['name' => 'delete comments']);

        Permission::create(['name' => 'list gifts']);
        Permission::create(['name' => 'view gifts']);
        Permission::create(['name' => 'create gifts']);
        Permission::create(['name' => 'update gifts']);
        Permission::create(['name' => 'delete gifts']);

        Permission::create(['name' => 'list giftpayments']);
        Permission::create(['name' => 'view giftpayments']);
        Permission::create(['name' => 'create giftpayments']);
        Permission::create(['name' => 'update giftpayments']);
        Permission::create(['name' => 'delete giftpayments']);

        Permission::create(['name' => 'list invitedguests']);
        Permission::create(['name' => 'view invitedguests']);
        Permission::create(['name' => 'create invitedguests']);
        Permission::create(['name' => 'update invitedguests']);
        Permission::create(['name' => 'delete invitedguests']);

        Permission::create(['name' => 'list orders']);
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'create orders']);
        Permission::create(['name' => 'update orders']);
        Permission::create(['name' => 'delete orders']);

        Permission::create(['name' => 'list quotes']);
        Permission::create(['name' => 'view quotes']);
        Permission::create(['name' => 'create quotes']);
        Permission::create(['name' => 'update quotes']);
        Permission::create(['name' => 'delete quotes']);

        Permission::create(['name' => 'list stories']);
        Permission::create(['name' => 'view stories']);
        Permission::create(['name' => 'create stories']);
        Permission::create(['name' => 'update stories']);
        Permission::create(['name' => 'delete stories']);

        Permission::create(['name' => 'list themes']);
        Permission::create(['name' => 'view themes']);
        Permission::create(['name' => 'create themes']);
        Permission::create(['name' => 'update themes']);
        Permission::create(['name' => 'delete themes']);

        Permission::create(['name' => 'list visitors']);
        Permission::create(['name' => 'view visitors']);
        Permission::create(['name' => 'create visitors']);
        Permission::create(['name' => 'update visitors']);
        Permission::create(['name' => 'delete visitors']);

        Permission::create(['name' => 'list weddingceremonies']);
        Permission::create(['name' => 'view weddingceremonies']);
        Permission::create(['name' => 'create weddingceremonies']);
        Permission::create(['name' => 'update weddingceremonies']);
        Permission::create(['name' => 'delete weddingceremonies']);

        Permission::create(['name' => 'list allweddingdata']);
        Permission::create(['name' => 'view allweddingdata']);
        Permission::create(['name' => 'create allweddingdata']);
        Permission::create(['name' => 'update allweddingdata']);
        Permission::create(['name' => 'delete allweddingdata']);

        Permission::create(['name' => 'list weddingreceptions']);
        Permission::create(['name' => 'view weddingreceptions']);
        Permission::create(['name' => 'create weddingreceptions']);
        Permission::create(['name' => 'update weddingreceptions']);
        Permission::create(['name' => 'delete weddingreceptions']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $superRole = Role::create(['name' => 'super']);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
            $user->assignRole($superRole);
        }
    }
}
