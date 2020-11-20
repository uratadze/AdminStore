<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = config('permissions');
        foreach($permissions as $key => $permission) {
            foreach($permission as $permission) {
                Permission::updateOrCreate([
                    'name' => $permission,
                    'guard_name' => 'web',
                ]);
            }
        }
        
    }
}
