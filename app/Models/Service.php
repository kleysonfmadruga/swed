<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'id',
        'name'
    ];

    public function establishments(){
        return $this->belongsToMany('establishments')->withPivot('service_id_establishment_id');
    }

    public function saveService($request) {
        try {
            DB::beginTransaction();

            $id = null;

            if (isset($request->service) && $request->service != 'new') {
                $service = $this->find($request->service);
                $id = $service->id;
            } else {
                $this->name = $request->new_service;
                $this->save();
                $id = $this->id;
            }

            DB::table('service_id_establishment_id')->insert([
                'price' => $request->price,
                'description' => $request->description,
                'service_id' => $id,
                'establishment_id' => $request->establishment_id,
            ]);

            DB::commit();

            return true;

        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }

    }

    public function deleteService($request){
        try {
            DB::beginTransaction();
            DB::table('service_id_establishment_id')
                ->where('id', $request->establishment_service_id)
                ->delete();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
}
