<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            [
                'name' => 'Administrador'
            ],
            [
                'name' => 'Cliente'
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
