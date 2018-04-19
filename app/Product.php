<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function languages(){
        return $this->belongsToMany(Language::class)->withTimestamps()->withPivot('id','name','description','summary');
    }

    public function photoproducts(){
        return $this->hasMany(Photoproduct::class);
    }

    public function categoryproduct(){
        return $this->belongsTo(Categoryproduct::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
