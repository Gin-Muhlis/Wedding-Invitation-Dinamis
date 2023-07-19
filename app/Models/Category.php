<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['category', 'price'];

    protected $searchableFields = ['*'];

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }

    public function fiturCategories()
    {
        return $this->belongsToMany(
            FiturCategory::class,
            'category_fitur_category',
            'category_id'
        );
    }
}
