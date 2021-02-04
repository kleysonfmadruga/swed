<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return vo   'id
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('states')->insert([
            ['id' => '2', 'name' => 'Acre', 'abbreviation' => 'AC', 'zip_code' => '12'],
            ['id' => '14', 'name' => 'Alagoas', 'abbreviation' => 'AL', 'zip_code' => '27'],
            ['id' => '3', 'name' => 'Amazonas', 'abbreviation' => 'AM', 'zip_code' => '13'],
            ['id' => '6', 'name' => 'Amapá', 'abbreviation' => 'AP', 'zip_code' => '16'],
            ['id' => '16', 'name' => 'Bahia', 'abbreviation' => 'BA', 'zip_code' => '29'],
            ['id' => '10', 'name' => 'Ceará', 'abbreviation' => 'CE', 'zip_code' => '23'],
            ['id' => '27', 'name' => 'Distrito Federal', 'abbreviation' => 'DF', 'zip_code' => '53'],
            ['id' => '18', 'name' => 'Espírito Santo', 'abbreviation' => 'ES', 'zip_code' => '32'],
            ['id' => '26', 'name' => 'Goiás', 'abbreviation' => 'GO', 'zip_code' => '52'],
            ['id' => '8', 'name' => 'Maranhão', 'abbreviation' => 'MA', 'zip_code' => '21'],
            ['id' => '17', 'name' => 'Minas Gerais', 'abbreviation' => 'MG', 'zip_code' => '31'],
            ['id' => '24', 'name' => 'Mato Grosso do Sul', 'abbreviation' => 'MS', 'zip_code' => '50'],
            ['id' => '25', 'name' => 'Mato Grosso', 'abbreviation' => 'MT', 'zip_code' => '51'],
            ['id' => '5', 'name' => 'Pará', 'abbreviation' => 'PA', 'zip_code' => '15'],
            ['id' => '12', 'name' => 'Paraiba', 'abbreviation' => 'PB', 'zip_code' => '25'],
            ['id' => '13', 'name' => 'Pernambuco', 'abbreviation' => 'PE', 'zip_code' => '26'],
            ['id' => '9', 'name' => 'Piauí', 'abbreviation' => 'PI', 'zip_code' => '22'],
            ['id' => '21', 'name' => 'Paraná', 'abbreviation' => 'PR', 'zip_code' => '41'],
            ['id' => '19', 'name' => 'Rio de Janeiro', 'abbreviation' => 'RJ', 'zip_code' => '33'],
            ['id' => '11','name' => 'Rio Grande do Norte', 'abbreviation' => 'RN', 'zip_code' => '24'],
            ['id' => '1', 'name' => 'Rondônia', 'abbreviation' => 'RO', 'zip_code' => '11'],
            ['id' => '4', 'name' => 'Roraima', 'abbreviation' => 'RR', 'zip_code' => '14'],
            ['id' => '23', 'name' => 'Rio Grande do Sul', 'abbreviation' => 'RS', 'zip_code' => '43'],
            ['id' => '22', 'name' => 'Santa Catarina', 'abbreviation' => 'SC', 'zip_code' => '42'],
            ['id' => '15', 'name' => 'Sergipe', 'abbreviation' => 'SE', 'zip_code' => '28'],
            ['id' => '20', 'name' => 'São Paulo', 'abbreviation' => 'SP', 'zip_code' => '35'],
            ['id' => '7', 'name' => 'Tocantins', 'abbreviation' => 'TO', 'zip_code' => '17'],
        ]);
    }
}
