<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use App\Traits\HasStatusHistory;

class ShopRequest extends Model
{
    use HasStatusHistory;

    protected $guarded = [];

    protected $casts = [
        'status' => \App\Enums\ShopRequestStatus::class,
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    protected function getStatusHistoryModelClass()
    {
        return ShopRequestStatusHistory::class;
    }

    public function items(): HasMany
    {
        return $this->hasMany(ShopRequestItem::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}