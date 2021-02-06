<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'id',
        'name'
    ];

    public function saveProduct($request) {
        // dd($request);
        try {
            DB::beginTransaction();
            
            $id = null;

            if (isset($request->product) && $request->product != 'new') {
                $product = $this->find($request->product);
                $id = $product->id;
            } else {
                $this->name = $request->new_product;
                $this->save();
                $id = $this->id;
            }

            DB::table('product_id_establishment_id')->insert([
                'price' => $request->price,
                'description' => $request->description,
                'product_id' => $id,
                'establishment_id' => $request->establishment_id,
            ]);

            DB::commit();

            return true;

        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
        
    }

    public function deleteProduct($request){
        try {
            DB::beginTransaction();

            DB::table('product_id_establishment_id')
                ->where('id', $request->establishment_product_id)
                ->delete();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
}
