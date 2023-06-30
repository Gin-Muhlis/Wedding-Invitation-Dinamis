<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'story_date',
        'story_image',
        'story_title',
        'content',
        'order_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'story_date' => 'date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
