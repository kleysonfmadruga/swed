<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Establishment;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    public function merge(Request $request) {

        try {
            $response = $this->service->saveService($request);
            if ($response == true) {
                return redirect()->route('establishment.show', ['id' => $request->establishment_id]);
            } else {
                throw new \Error($response);
            }
        } catch (\Throwable $th) {
            $establishment = Establishment::find($request->establishment_id);
            return redirect()->back()->withErrors(['msg' => $th->getMessage()])->compact('establishment');
        }
    }
}
