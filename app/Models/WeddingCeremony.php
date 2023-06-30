<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeddingCeremony extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'ceremony_date',
        'ceremony_time',
        'ceremony_place',
        'ceremony_address',
        'order_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'wedding_ceremonies';

    protected $casts = [
        'ceremony_date' => 'date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
