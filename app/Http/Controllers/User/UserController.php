<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function edit($id){
        $user = User::find($id);

        if(!$user->enabled){
            return redirect()->route('dashboard.index');
        }

        return view('pages.manager.edit_profile', compact('user'));
    }

    public function merge(Request $request){
        $user = User::find($request->id);

        if(Hash::check($request->password, $user->password)){
            $user->name = $request->name;
            $user->email = $request->email;

            if($request->hasFile('photo')){
                $photoFile = $request->file('photo');
                $photoPath = $photoFile->store('profile_photo');
                $user->photo = "storage/".$photoPath;
            }

            $user->save();

            return redirect()->route('profile.index', $user->id);
        } else {
            return redirect()->back()->withErrors(['msg' => 'Senha incorreta!'])->withInput();
        }
    }

    public function index($id){
        $user = User::find($id);

        if(!$user->enabled){
            return redirect()->route('dashboard.index');
        }

        return view('pages.manager.profile', compact('user'));
    }

    public function disable($id){
        $user = User::find($id);
        $user->enabled = false;
        $user->save();

        return redirect()->route('dashboard.index');
    }

    public function logout(){
        return redirect()->route('dashboard.index');
    }

    
}
