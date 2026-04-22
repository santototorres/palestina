<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResourceItemTranslation extends Model
{
    protected $guarded = [];

    public function resourceItem(): BelongsTo
    {
        return $this->belongsTo(ResourceItem::class);
    }
}