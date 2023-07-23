<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReplyRsvp extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'reply',
        'kehadiran',
        'bg_profile',
        'rsvp_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'reply_rsvps';

    public function rsvp()
    {
        return $this->belongsTo(Rsvp::class);
    }
}
