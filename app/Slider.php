<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function languages(){
        return $this->belongsToMany(Language::class)->withTimestamps()->withPivot('id','title','description');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
