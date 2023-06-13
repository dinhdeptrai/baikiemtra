<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Bills;
use App\Models\Product;

class BillDetail extends Model
{
    use HasFactory;
    protected $table='bill_detail';

    public function bill(){
        return $this->belongsTo(Bill::class,'id_bill','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'id_product','id');
    }

}
