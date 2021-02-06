<?php

namespace App\Http\Controllers\Establishment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Establishment;
use App\Services\Methods\Filters;
use Illuminate\Support\Facades\DB;

class EstablishmentController extends Controller
{
    
    public $establishment;

    public function __construct()
    {
        $this->establishment = New Establishment();
    }
    
    public function index() {
        $cities = Filters::makeArrayCityByState();
        $manager_establishment = DB::table('manager_establishment')->where('user_id', 1)->get()->pluck('establishment_id');
        $establishments = Establishment::whereIn('id', $manager_establishment)->get();
        return view('pages.manager.index', compact('cities', 'establishments'));
    }

    public function merge(Request $request) {

        try {
            $response = $this->establishment->saveEstablishment($request);
            if ($response == true) {
                return redirect()->route('establishment.index');
            } else {
                throw new \Error($response);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    public function show($id) {
        $establishment = Establishment::find($id);
        $establishment_services = Filters::makeArrayEstablishmentServices($id);
        $establishment_products = Filters::makeArrayEstablishmentProducts($id);
        $services = Filters::makeArrayServices();
        $products = Filters::makeArrayProducts();

        return view('pages.manager.establishment.index', compact('establishment', 'establishment_services', 'establishment_products', 'services', 'products'));
    }
}
