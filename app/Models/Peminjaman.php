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

    public function weapon(): BelongsTo
    {
        return $this->belongsTo(Weapon::class, 'weapon_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function save(array $options = [])
    {
        if (!$this->user_id) {
            $this->user_id = Auth::id();
        }
        parent::save($options);
    }
}
