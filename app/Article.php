<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table='articles';
    protected $fillable=['tittle','description','is_public','user_id','category_id'];


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
