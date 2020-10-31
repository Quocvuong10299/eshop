<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public function Categori(){
        return $this->belongsTo("App\Models\Caterogies","cate_id");
    }
}
