<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gift extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'owner_name',
        'no_data',
        'order_id',
        'gift_payment_id',
    ];

    protected $searchableFields = ['*'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function giftPayment()
    {
        return $this->belongsTo(GiftPayment::class);
    }
}
