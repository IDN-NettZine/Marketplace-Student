<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Notification extends Model
{
    protected $fillable = ['user_id', 'judul', 'isi', 'is_read'];

    protected function casts(): array
    {
        return ['is_read' => 'boolean',];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
