<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StudentVerification extends Model
{
    protected $fillable = ['user_id', 'nim', 'email_kampus', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
