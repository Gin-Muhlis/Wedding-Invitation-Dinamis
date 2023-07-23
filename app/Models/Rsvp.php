<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rsvp extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'comment',
        'kehadiran',
        'bg_profile',
        'order_id',
    ];

    protected $searchableFields = ['*'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function replyRsvps()
    {
        return $this->hasMany(ReplyRsvp::class);
    }
}
