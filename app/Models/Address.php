<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'codigo',
    ];

    //una direccion pertenece a un usuario
    public function user(): BelongsTo{
        return $this->belongsTo(user::class);
    }
}
