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
        'gift_payment_id',
        'owner_name',
        'no_data',
        'order_id',
    ];

    protected $searchableFields = ['*'];

    public function giftPayment()
    {
        return $this->belongsTo(GiftPayment::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
