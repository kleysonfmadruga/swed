<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return vo   'id
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('services')->insert([
            ['name' => 'Corte de cabelo'],
            ['name' => 'Corte de barba'],
            ['name' => 'Pintura de cabelo'],
            ['name' => 'Micropigmentação'],
            ['name' => 'Maquiagem'],
            ['name' => 'Manicure'],
            ['name' => 'Pedicure'],
            ['name' => 'Lava-jato'],
            ['name' => 'Troca de óleo'],
            ['name' => 'Cambagem'],
            ['name' => 'Alinhamento'],
            ['name' => 'Lanternagem'],
        ]);
    }
}
