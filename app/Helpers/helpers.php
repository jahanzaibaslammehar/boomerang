<?php

namespace App\Helpers;

use App\Models\Permission;

if (!function_exists('setPermissionsAndModules')) {
    function setPermissionsAndModules($scema = null): array
    {
        $allPermissions = Permission::all()->pluck('name')->toArray();

        $roleSchemas = [
            'LM-Admin' => [
                'modules' => [],
                'permissions' => $allPermissions
            ],
            'Company' => [
                'modules' => [
                    'Dashboard',
                    'Shopper',
                    'Role',
                    'User',
                    'CompanyAccount',
                    'Designation',
                    'Employee',
                    // 'Reports',
                    // 'Ticket',
                    // 'OutletLogs',
                    // 'Attachment',
                    'Sale',
                    // 'Notification'
                ],
                'permissions' => [
                    // 'category-view',
                    // 'uom-view',
                    'shopper-view',
                    // 'brand-view',
                    // 'country-view',
                    'city-view',
                    'company-view',
                    'company-edit',
                    'permission-view',
                    // 'product-view',
                    // 'outlet-view',
                    // 'outlet-stock-view'
                ]
            ],
        ];

        if (!isset($roleSchemas[$scema])) {
            return [
                'permissionModules' => [],
                'permissionNames' => []
            ];
        }

        return [
            'permissionModules' => $roleSchemas[$scema]['modules'],
            'permissionNames' => $roleSchemas[$scema]['permissions']
        ];
    }
}
