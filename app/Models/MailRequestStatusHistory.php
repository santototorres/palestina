<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MailRequestStatusHistory extends Model
{
    protected $table = 'mail_request_status_history';
    protected $guarded = [];

    protected $casts = [
        'old_status' => \App\Enums\MailRequestStatus::class,
        'new_status' => \App\Enums\MailRequestStatus::class,
    ];

    public function mailRequest(): BelongsTo
    {
        return $this->belongsTo(MailRequest::class);
    }

    public function changedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}