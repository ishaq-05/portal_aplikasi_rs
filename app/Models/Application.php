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

    ];


    public function visits(): HasMany
    {
        return $this->hasMany(
            ApplicationVisit::class
        );
    }
}
