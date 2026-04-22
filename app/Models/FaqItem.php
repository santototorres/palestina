<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FaqItem extends Model
{
    protected $guarded = [];

    public function translations(): HasMany
    {
        return $this->hasMany(FaqItemTranslation::class);
    }
}