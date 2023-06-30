<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['question', 'answer'];

    protected $searchableFields = ['*'];
}
