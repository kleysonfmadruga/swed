<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Establishment extends Model
{
    use HasFactory;

    protected $table = 'establishments';
    protected $fillable = [
        'cnpj',
        'name',
        'opening_hours',
    ];

    public function saveEstablishment($request) {

        try {
            DB::beginTransaction();

            $this->name = $request->name;
            $this->cnpj = $request->cnpj;
            $this->opening_hours = $request->opening_hours;
            $this->save();

            DB::table('phones')->insert([
                'phone' => $request->phone,
                'establishment_id' => $this->id,
            ]);

            DB::table('address_establishment')->insert([
                'neighborhood' => $request->neighborhood,
                'street' => $request->street,
                'cep' => $request->cep,
                'city_id' => $request->cities,
                'establishment_id' => $this->id,
            ]);
            DB::table('manager_establishment')->insert([
                'user_id' => 1,
                'establishment_id' => $this->id,
            ]);
            
            DB::commit();

            return true;

        } catch (\Throwable $th) {

            DB::rollback();

            return $th->getMessage();
        }

    }
}
