<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return vo   'id
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('products')->insert([
            ['name' => 'Feijão'],
            ['name' => 'Arroz'],
            ['name' => 'Óleo'],
            ['name' => 'Manteiga'],
            ['name' => 'Margarina'],
            ['name' => 'Banha de porco'],
            ['name' => 'Peito de frango'],
            ['name' => 'Milho'],
            ['name' => 'Salsicha'],
            ['name' => 'Linguiça'],
            ['name' => 'Leite'],
            ['name' => 'Farinha de trigo'],
            ['name' => 'Sal'],
            ['name' => 'Açúcar'],
            ['name' => 'Tomate'],
            ['name' => 'Cebola'],
            ['name' => 'Pimentão'],
            ['name' => 'Papel higiênico'],
            ['name' => 'Pizza'],
            ['name' => 'Biscoito'],
            ['name' => 'Pão'],
            ['name' => 'Pão doce'],
            ['name' => 'Desinfetante'],
            ['name' => 'Sabão'],
            ['name' => 'Creme dental'],
            ['name' => 'Conjunto de pratos'],
            ['name' => 'Conjunto de copos'],
            ['name' => 'Faqueiro'],
            ['name' => 'Conjunto de panelas'],
            ['name' => 'Toalha'],
            ['name' => 'Lençol'],
            ['name' => 'Capa de colchão'],
            ['name' => 'Pacote de folhas de ofício'],
            ['name' => 'EVA'],
            ['name' => 'Cola'],
            ['name' => 'Tesoura'],
            ['name' => 'Lápis de cor'],
            ['name' => 'Calça'],
            ['name' => 'Camisa'],
            ['name' => 'Camiseta'],
            ['name' => 'Short'],
            ['name' => 'Sapato'],
            ['name' => 'Chinelo'],
            ['name' => 'Boné'],
            ['name' => 'Óculos de sol'],
            ['name' => 'Fraldas'],
            ['name' => 'Farelo de milho'],
            ['name' => 'Ração para aves'],
            ['name' => 'Ração para cães'],
            ['name' => 'Ração para gatos'],
            ['name' => 'Ração de crescimento'],
            ['name' => 'Vermífugo'],
        ]);
    }
}
