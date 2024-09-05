<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'photo',
        'category_id',
        'merchant_id',
    ];

    function category()
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }

    protected $appends = [
        'photo_url',
    ];

    function photoUrl(): Attribute
    {
        return new Attribute(
            get: function () {
                return asset('/cdn/menus/' . ($this->photo ?: 'default.jpg'));
            }
        );
    }
}
