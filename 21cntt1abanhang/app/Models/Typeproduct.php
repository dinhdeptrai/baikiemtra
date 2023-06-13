<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Typeproduct extends Model
{
    use HasFactory;
    protected $table="type_products";
    public function product(): HasMany
    {
        return $this->HasMany(Product::class,'id_type','id');
    }
}
