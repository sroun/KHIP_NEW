<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function languages(){
        return $this->belongsToMany(Language::class)->withTimestamps()->withPivot('id','title','url','logo');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_added');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
