<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    public function Product(){
        return $this->hasMany("App\Models\Categories","cate_id");
    }
    protected $primaryKey = 'article_id';
    public $incrementing = false;
}
