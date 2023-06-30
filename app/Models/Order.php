<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'no_order',
        'order_date',
        'domain',
        'user_id',
        'theme_id',
        'total_order',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'order_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function invitedGuests()
    {
        return $this->hasMany(InvitedGuest::class);
    }

    public function bridegrooms()
    {
        return $this->hasMany(Bridegroom::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function weddingCeremonies()
    {
        return $this->hasMany(WeddingCeremony::class);
    }

    public function allWeddingData()
    {
        return $this->hasMany(WeddingData::class);
    }

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function weddingReceptions()
    {
        return $this->hasMany(WeddingReception::class);
    }

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }
}
