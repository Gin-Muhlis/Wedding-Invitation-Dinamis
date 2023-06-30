<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiftPayment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'icon'];

    protected $searchableFields = ['*'];

    protected $table = 'gift_payments';

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }
}
