<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable=['name'];

    //attributes
    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class,'movie_category');
    }

    //scope search
    public function scopeWhenSearch($query , $search){
//        return $query->when($search,function ($q)use ($search){
//            return $q->where('name','like','%$search%');
//        });
        return $query->where('name','like','%'.$search.'%');

    }
}
