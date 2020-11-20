<?php

use Illuminate\Database\Seeder;
use App\Models\ModelPermission;

class ModelPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,7) as $permission)
        {
            ModelPermission::updateOrCreate([
                'permission_id' => $permission,
                'model_type'    => 'App\User',
                'model_id'      => 1,
            ]);
        }
    }
}
