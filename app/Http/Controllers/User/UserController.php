<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    protected $user;

    public function __construct() {
        $this->user = new User();
    }

    public function newGerente(Request $request) {
        try {
            $saveUser = $this->user->saveUser($request);
            if(is_int($saveUser)) {
                DB::beginTransaction();
                DB::table('model_has_roles')->insert([
                    'role_id' => 1,
                    'model_type' => 'App\User',
                    'model_id' => $saveUser
                ]);
                DB::commit();
                return redirect()->route('dashboard.index');
            } else {
                throw new \Error($saveUser);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $th->getMessage()])->withInput();
        }
    }

    public function newCliente(Request $request) {
        try {
            $saveUser = $this->user->saveUser($request);
            if(is_int($saveUser)) {
                DB::beginTransaction();
                DB::table('model_has_roles')->insert([
                    'role_id' => 2,
                    'model_type' => 'App\User',
                    'model_id' => $saveUser
                ]);
                DB::commit();
                return redirect()->route('dashboard.index');
            } else {
                throw new \Error($saveUser);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $th->getMessage()])->withInput();
        }
    }
}
