<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'user_id',
    ];

    // Relasi Many-to-One: Satu Post dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
