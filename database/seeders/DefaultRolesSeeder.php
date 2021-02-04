<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        \Illuminate\Support\Facades\DB::table('roles')->insert([
            ['id' => $count++, 'name' => 'Gerente', 'guard_name' => 'web'],
            ['id' => $count++, 'name' => 'Cliente', 'guard_name' => 'web'],
        ]);
    }
}
