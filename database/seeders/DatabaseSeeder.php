<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->create(['permission_key' => 'categories_index']);
        Permission::query()->create(['permission_key' => 'categories_show']);
        Permission::query()->create(['permission_key' => 'categories_store']);
        Permission::query()->create(['permission_key' => 'categories_update']);
        Permission::query()->create(['permission_key' => 'categories_create']);
        Permission::query()->create(['permission_key' => 'products_index']);
        Permission::query()->create(['permission_key' => 'products_show']);
        Permission::query()->create(['permission_key' => 'products_store']);
        Permission::query()->create(['permission_key' => 'products_update']);
        Permission::query()->create(['permission_key' => 'products_create']);
    }
}
