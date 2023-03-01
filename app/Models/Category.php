<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['parent_category_id', 'name', 'slug'];

    public function setSlugAttribute()
    {
        $slug = Str::slug($this->name);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $this->slug = $count ? "{$slug}-{$count}" : $slug;
        $this->attributes['slug'] = $this->slug;
    }
}
