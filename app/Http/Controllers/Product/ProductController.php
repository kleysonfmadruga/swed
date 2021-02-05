<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Establishment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function merge(Request $request) {
        // dd($request);
        try {
            $response = $this->product->saveProduct($request);
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
