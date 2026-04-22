<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FaqItemTranslation extends Model
{
    protected $guarded = [];

    public function faqItem(): BelongsTo
    {
        return $this->belongsTo(FaqItem::class);
    }
}