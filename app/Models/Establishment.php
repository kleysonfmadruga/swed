<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Establishment extends Model
{
    use HasFactory;

    protected $table = 'establishments';
    protected $fillable = [
        'cnpj',
        'name',
        'opening_hours',
        'enabled',
    ];

    public function getAddress()
    {
        $addresses = DB::table('address_establishment')
            ->where('address_establishment.establishment_id', '=', $this->id)
            ->join('cities', 'cities.id', '=', 'address_establishment.city_id')
            ->get(['name', 'cep', 'street', 'neighborhood']);

        $addressesStr = '';

        foreach ($addresses as $address) {
            $addressesStr = $addressesStr . $address->name . ' - ' . $address->street . ', ' . $address->neighborhood . ' - ' . $address->cep . "\n";
        }

        return $addressesStr;
    }

    public function getPhone()
    {
        $phone = DB::table('phones')->where('establishment_id', '=', $this->id)->first();

        return $phone->phone;
    }

    public function getManager()
    {
        $managerEstablishment = DB::table('manager_establishment')->where('manager_establishment.establishment_id', '=', $this->id)->first();

        $managerNames = DB::table('users')
            ->where('users.id', '=', $managerEstablishment->user_id)
            ->pluck('name');

        $names = '';

        foreach ($managerNames as $name) {
            $names = $names . $name . ", ";
        }

        return substr($names, 0, strlen($names) - 2);
    }

    public function getCategory()
    {
        $establishmentCategories = DB::table('category_id_establishment_id')->where('category_id_establishment_id.establishment_id', '=', $this->id)->first();

        $categoryNames = DB::table('categories')
            ->where('categories.id', '=', $establishmentCategories->category_id)
            ->pluck('name');

        $names = '';

        foreach ($categoryNames as $name) {
            $names = $names . $name . ", ";
        }

        return substr($names, 0, strlen($names) - 2);
    }

    public function saveEstablishment($request)
    {

        try {
            DB::beginTransaction();

            $this->name = $request->name;
            $this->cnpj = $request->cnpj;
            $this->opening_hours = $request->opening_hours;
            $this->description = $request->description;
            $this->enabled = 1;

            $this->save();

            DB::table('phones')->insert([
                'phone' => $request->phone,
                'establishment_id' => $this->id,
            ]);

            DB::table('category_id_establishment_id')->insert([
                'category_id' => $request->categories,
                'establishment_id' => $this->id
            ]);

            DB::table('address_establishment')->insert([
                'neighborhood' => $request->neighborhood,
                'street' => $request->street,
                'cep' => $request->cep,
                'city_id' => $request->cities,
                'establishment_id' => $this->id,
            ]);
            DB::table('manager_establishment')->insert([
                'user_id' => Auth::user()->id,
                'establishment_id' => $this->id,
            ]);

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollback();

            return $th->getMessage();
        }
    }

    public function updateEstablishment($request)
    {

        try {
            DB::beginTransaction();

            $this->name = $request->name;
            $this->cnpj = $request->cnpj;
            $this->opening_hours = $request->opening_hours;
            $this->description = $request->description;

            $this->save();

            DB::table('phones')
                ->where('establishment_id', $this->id)
                ->update([
                    'phone' => $request->phone
                ]);

            DB::table('address_establishment')
                ->where('establishment_id', $this->id)
                ->update([
                    'neighborhood' => $request->neighborhood,
                    'street' => $request->street,
                    'cep' => $request->cep,
                    'city_id' => $request->cities
                ]);

            DB::commit();

            return true;
        } catch (\Throwable $th) {

            DB::rollback();

            return $th->getMessage();
        }
    }
}
