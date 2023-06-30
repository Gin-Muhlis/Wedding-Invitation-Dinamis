<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvitedGuest extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['link', 'name', 'order_id'];

    protected $searchableFields = ['*'];

    protected $table = 'invited_guests';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
