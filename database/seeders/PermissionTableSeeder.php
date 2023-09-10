<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'invoice-list',
            'invoice-create',
            'invoice-edit',
            'invoice-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'invoice-details-list',
            'invoice-details-create',
            'invoice-details-edit',
            'invoice-details-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'section-list',
            'section-create',
            'section-edit',
            'section-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
