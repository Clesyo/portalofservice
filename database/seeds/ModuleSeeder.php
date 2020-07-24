<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $modules = [
            [
                'name' => 'Empresa',
                'pay' => 0,
                'status' => 1,
            ],
            [
                'name' => 'Serviços',
                'pay' => 0,
                'status' => 1,
            ],
            [
                'name' => 'Endereços',
                'pay' => 0,
                'status' => 1,
            ],
            [
                'name' => 'Coordenadas',
                'pay' => 0,
                'status' => 1,
            ],
        ];

        DB::table('modules')->insert($modules);
    }
}
