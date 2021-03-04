<?php

namespace App\Http\Controllers\Establishment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Establishment;
use App\Models\User;
use App\Services\Methods\Filters;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstablishmentController extends Controller
{

    public $establishment;

    public function __construct()
    {
        $this->establishment = new Establishment();
    }

    public function index($id) {
        $cities = Filters::makeArrayCityByState();
        $manager_establishment = DB::table('manager_establishment')->where('user_id', $id)->get()->pluck('establishment_id');
        $establishments = Establishment::whereIn('id', $manager_establishment)->get();
        $user = User::find($id);
        $categories = Filters::makeArrayCategories();
        return view('pages.manager.index', compact('cities', 'establishments', 'user', 'categories'));
    }

    public function merge(Request $request) {

        try {
            if ($request->id == null) {
                $response = $this->establishment->saveEstablishment($request);
            } else {
                $this->establishment = Establishment::find($request->id);
                $response = $this->establishment->updateEstablishment($request);
            }
            if ($response == true) {
                return redirect()->route('establishment.index', ['id' => Auth::user()->id ]);
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
        $user = Auth::user();

        return view('pages.manager.establishment.index',
        compact('establishment', 'establishment_services',
        'establishment_products', 'services', 'products', 'user'));
    }

    public function showResult($id){
        $establishment = Establishment::find($id);
        $establishment_services = Filters::makeArrayEstablishmentServices($id);
        $establishment_products = Filters::makeArrayEstablishmentProducts($id);
        $services = Filters::makeArrayServices();
        $products = Filters::makeArrayProducts();

        if(Auth::check()){
            $user = Auth::user();

            return view('pages.result.show',
            compact('establishment', 'establishment_services',
            'establishment_products', 'services', 'products', 'user'));
        } else {
            return view('pages.result.show',
            compact('establishment', 'establishment_services',
            'establishment_products', 'services', 'products'));
        }
    }

    public function edit($id){
        $addresses = DB::table('address_establishment')
            ->where('address_establishment.establishment_id', '=', $id)
            ->get(['cep', 'street', 'neighborhood', 'city_id']);

        $selectedCity = DB::table('cities')->where('id', '=', $addresses[0]->city_id)->get();

        $selectedState = DB::table('states')->where('id', '=', $selectedCity[0]->state_id)->get();

        $establishment = Establishment::find($id);
        $cities = Filters::makeArrayCityByState();
        $user = Auth::user();

        return view('pages.manager.establishment.edit',
        compact('establishment', 'cities', 'selectedCity',
        'selectedState', 'addresses', 'user'));
    }
}
