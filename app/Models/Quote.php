<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['quote', 'surat', 'wedding_data_id'];

    protected $searchableFields = ['*'];

    public function weddingData()
    {
        return $this->belongsTo(WeddingData::class);
    }
}
