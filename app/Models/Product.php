<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\ProductTag;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function tage(){
        return $this->hasMany(ProductTag::class);
    }
}
