<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table="roles";
    protected $fillable=['name','user_id'];

    public function users(){
        return $this->hasMany(User::class);
    }
}
