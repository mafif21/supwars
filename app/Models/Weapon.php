<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Weapon extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'name', 'image', 'description', 'available', 'price'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_weapon');
    }

    public function peminjaman(): HasOne
    {
        return $this->hasOne(Peminjaman::class);
    }
}
