<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use App\Traits\HasStatusHistory;

class MailRequest extends Model
{
    use HasStatusHistory;

    protected $guarded = [];

    protected $casts = [
        'status' => \App\Enums\MailRequestStatus::class,
        'consent_accepted' => 'boolean',
        'physical_process_acknowledged' => 'boolean',
        'submitted_at' => 'datetime',
        'processed_at' => 'datetime',
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
        return MailRequestStatusHistory::class;
    }

    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'processed_by');
    }
}