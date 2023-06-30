<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['theme_name', 'theme_code', 'catgory_id', 'type'];

    protected $searchableFields = ['*'];

    public function catgory()
    {
        return $this->belongsTo(Catgory::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
