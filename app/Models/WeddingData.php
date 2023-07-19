<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeddingData extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'male_image',
        'female_image',
        'cover_image',
        'wedding_coordinate',
        'giff_address',
        'music',
        'order_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'wedding_data';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
