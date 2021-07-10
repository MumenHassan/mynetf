<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    //scope--------------------------
    public function scopeWhenSearch($query,$search){
        return $query->where('name','like','%'.$search.'%')->OrWhere('email','like','%'.$search.'%');
    }

    public function scopeWhenRole($query,$role_id){
        return $query->when($role_id,function ($q) use ($role_id){
            return $this->scopeWhereRole($q,$role_id);
        });
    }

    public function scopeWhereRole($query,$role_id){

        return $query->whereHas('roles', function ($q) use($role_id){
            return $q->whereIn('id',(array)$role_id);
        });
    }

    public function scopeWhereRoleNot($query,$role_name){

        return $query->whereHas('roles', function ($q) use($role_name){
            return $q->whereNotIn('name',(array)$role_name);
        });
    }
}
