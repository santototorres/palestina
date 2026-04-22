<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopRequestStatusHistory extends Model
{
    protected $table = 'shop_request_status_history';
    protected $guarded = [];

    protected $casts = [
        'old_status' => \App\Enums\ShopRequestStatus::class,
        'new_status' => \App\Enums\ShopRequestStatus::class,
    ];

    public function shopRequest(): BelongsTo
    {
        return $this->belongsTo(ShopRequest::class);
    }

    public function changedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}