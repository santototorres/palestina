<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopRequestItem extends Model
{
    protected $guarded = [];

    public function shopRequest(): BelongsTo
    {
        return $this->belongsTo(ShopRequest::class);
    }
}