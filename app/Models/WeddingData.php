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
        'wedding_coordinate',
        'greeting',
        'giff_address',
        'order_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'wedding_data';

    public function quote()
    {
        return $this->hasOne(Quote::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
