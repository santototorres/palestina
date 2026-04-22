<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmissionStatusHistory extends Model
{
    protected $table = 'submission_status_history';
    protected $guarded = [];

    protected $casts = [
        'old_status' => \App\Enums\SubmissionStatus::class,
        'new_status' => \App\Enums\SubmissionStatus::class,
    ];

    public function submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class);
    }

    public function changedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}