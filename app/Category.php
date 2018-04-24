<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function languages(){
        return $this->belongsToMany(Language::class)->withTimestamps()->withPivot('id','name');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_added');
    }

    public function promotions(){
        return $this->hasMany(Promotion::class);
    }

    public function aboutuses(){
        return $this->hasMany(Aboutus::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function careers(){
        return $this->hasMany(Career::class);
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }
    public function clients(){
        return $this->hasMany(Client::class);
    }
}
