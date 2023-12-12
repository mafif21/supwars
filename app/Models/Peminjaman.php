<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'weapon_id', 'tanggal_peminjaman', 'tanggal_dikembalikan'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setValidToValueAttribute($date)
    {
        $this->attributes['valid_to'] = strtotime($date);
    }

    public function weapons(): BelongsTo
    {
        return $this->belongsTo(Weapon::class, 'weapon_id');
    }

    public function save(array $options = [])
    {
        if (!$this->user_id) {
            $this->user_id = Auth::id();
        }
        parent::save($options);
    }
}
