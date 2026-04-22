<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmissionFile extends Model
{
    protected $guarded = [];

    protected $casts = [
        'document_type' => \App\Enums\DocumentType::class,
        'scan_status' => \App\Enums\ScanStatus::class,
    ];

    public function submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class);
    }
}