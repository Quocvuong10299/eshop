<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    public function Product(){
        return $this->hasMany("App\Models\Product","cate_id");
    }
    protected $primaryKey = 'cate_id';
    public $incrementing = false;
}
