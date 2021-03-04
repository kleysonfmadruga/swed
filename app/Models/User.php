<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'cpf',
        'photo',
        'enabled'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function saveUser($request) {

        try {

            if($request->password != $request->password_confirm) {
                throw new \Error('As senhas não são compatíveis');
            }
            $is_exist_email = $this->where('email', $request->email)->get()->first();
            if ($is_exist_email != null) {
                throw new \Error('O email: '.$request->email.' já está cadastrado!');
            }

            $photoPath = "";

            if ($request->hasFile('photo')){
                $photoFile = $request->allFiles()['photo'][0];
                $photoPath = $photoFile->store('profile_photo');
            } else {
                $photoPath = "profile_photo/default.png";
            }

            DB::beginTransaction();

            $this->name = $request->name;
            $this->email = $request->email;
            $this->password = Hash::make($request->password);
            $this->photo = "storage/".$photoPath;

            $this->enabled = true;
            $this->save();

            DB::commit();

            return $this->id;

        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
}
