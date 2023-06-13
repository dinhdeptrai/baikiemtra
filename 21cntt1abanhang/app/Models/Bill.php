<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Bill_Detail;
use App\Models\Customer;
class Bill extends Model
{
    use HasFactory;
    protected $table='bills';
    
    public function customer(): BelongsTo{
            return $this->belongsTo(Customer::class, 'id_customer','id');
        }
    public function billDetails(): HasOne
        {
            return $this->hasOne(BillDetail::class, 'id_bill','id');
        }
}
