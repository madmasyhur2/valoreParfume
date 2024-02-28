<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $data = [
        [
            'name' => 'Add to cart',
            'guard_name' => 'web'
        ],
        [
            'name' => 'CRUD Produk',
            'guard_name' => 'web'
        ],
        [
            'name' => 'Order',
            'guard_name' => 'web'
        ],
        [
            'name' => 'Payment',
            'guard_name' => 'web'
        ],
        [
            'name' => 'cek ongkir',
            'guard_name' => 'web'
        ]
    ];

    Permission::insert($data);

    }
}
