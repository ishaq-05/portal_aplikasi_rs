<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApplicationVisit extends Model
{
    protected $fillable = [
        'application_id',
        'session_id',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];

    public function application(): BelongsTo
    {
        return $this->belongsTo(
            Application::class
        );
    }
}
