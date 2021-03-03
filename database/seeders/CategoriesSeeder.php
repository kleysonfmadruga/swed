<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            ["name" => "barbearia"],
            ["name" => "mercado"],
            ["name" => "petshop"],
            ["name" => "oficina"],
            ["name" => "variedades"],
            ["name" => "roupas"],
            ["name" => "bar"],
            ["name" => "restaurante"],
            ["name" => "pizzaria"],
            ["name" => "manicure"],
            ["name" => "cabeleireiro"],
            ["name" => "borracharia"],
            ["name" => "reforço escolar"],
            ["name" => "suporte"],
        ]);
    }
}
