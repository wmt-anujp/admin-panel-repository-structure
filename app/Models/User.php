<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'slug', 'email', 'password', 'mobile_number', 'status'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($name) {
            $fullname = $name->first_name . ' ' . $name->last_name;
            $slug = Str::slug($fullname);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $name->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
}
