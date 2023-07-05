<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Website extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'website_name',
        'website_logo',
        'email',
        'whatsapp_number',
        'address',
        'link_instagram',
        'link_fb',
        'link_twitter',
        'description',
    ];

    protected $searchableFields = ['*'];
}
