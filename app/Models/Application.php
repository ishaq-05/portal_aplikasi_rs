<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    protected $fillable = [
        'name',
        'url',
        'description',
        'icon',
        'is_active',
        'notification_type',
        'notification_expires_at',
    ];

    protected $casts = [
        'notification_expires_at' => 'datetime',
    ];

    /**
     * Relasi aplikasi dengan data kunjungan/klik.
     */
    public function visits(): HasMany
    {
        return $this->hasMany(
            ApplicationVisit::class
        );
    }

    /**
     * Menentukan apakah badge NEW / UPDATE
     * masih berlaku.
     */
    public function hasActiveNotification(): bool
    {
        return !empty($this->notification_type)
            && $this->notification_expires_at !== null
            && $this->notification_expires_at->isFuture();
    }
}
