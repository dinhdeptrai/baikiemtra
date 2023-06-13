<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Typeproduct;
use App\Models\Bill_Detail;

class Product extends Model
{
    use HasFactory;
    protected $table='products';

    public function billDetail(){
        return $this->hasMany(BillDetail::class,'id_product','id');
    }
    public function Typeproduct(): BelongsTo
    {
        return $this->belongsTo(Typeproduct::class,'id_type','id');
    }
}
