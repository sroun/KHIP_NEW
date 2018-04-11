<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $table="positions";
    protected $fillable=['name','user_id'];

    public function users(){
        return $this->hasMany(User::class);
    }
}
