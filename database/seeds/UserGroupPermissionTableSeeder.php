<?php

use Illuminate\Database\Seeder;

class UserGroupPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Modules\User\Enums\GuardedModelsEnum::getNames() as $model) {
            DB::table('user_group_permissions')->insert([
                'model' => $model,
                'is_read_permitted' => true,
                'is_create_permitted' => true,
                'is_update_permitted' => true,
                'is_delete_permitted' => true,
                'user_group_id' => 1,
            ]);
        }
    }
}
