<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeddingReception extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'reception_date',
        'reception_time',
        'reception_address',
        'order_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'wedding_receptions';

    protected $casts = [
        'reception_date' => 'date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
