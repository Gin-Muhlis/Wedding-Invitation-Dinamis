<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bridegroom extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'male_fullname',
        'male_nickname',
        'male_mother_name',
        'male_father_name',
        'female_fullname',
        'female_nickname',
        'female_mother_name',
        'female_father_name',
        'order_id',
    ];

    protected $searchableFields = ['*'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
