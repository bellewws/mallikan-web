<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->delete();
        $data = [
            [
                'role_name' => 'Admin'
            ],
            [
                'role_name' => 'User'
            ]
        ];
        \DB::table('user_roles')->insert($data);

    }
}
