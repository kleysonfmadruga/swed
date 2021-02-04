<?php

namespace App\Services\Methods;

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
}
