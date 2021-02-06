<?php

namespace App\Services\Methods;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Filters extends Model
{
    use HasFactory;

    static public function makeArrayCityByState() {
        $response = [];

        $states = DB::table('states')->get();
        $count = count($states);
        $countArray = 0;
        for ($i=0; $i <= $count-1; $i++) {
            $cities = DB::table('cities')->where('state_id', $states[$i]->id)->get();
            foreach($cities as $item) {
                $item->abbreviation_state = $states[$i]->abbreviation;
                $response[$countArray++] = $item;
            }
        }

        return $response;
    }

    static public function makeArrayEstablishmentServices($id) {
        
        $response = [];
        $service_establishment = DB::table('service_id_establishment_id')
        ->where('establishment_id', $id)->get();

        foreach($service_establishment as $key => $item) {
            $aux = Service::find($item->service_id);
            $item->service_name = $aux->name;
            $response[$key] = $item;
        }

        return $response;
    }

    static public function makeArrayEstablishmentProducts($id) {
        $response = [];
        $product_establishment = DB::table('product_id_establishment_id')
        ->where('establishment_id', $id)->get();

        foreach($product_establishment as $key => $item) {
            $aux = Product::find($item->product_id);
            $item->product_name = $aux->name;
            $response[$key] = $item;
        }

        return $response;
    }
}
