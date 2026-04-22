<?php

namespace App\Traits;

trait HasStatusHistory
{
    public function statusHistory()
    {
        return $this->hasMany($this->getStatusHistoryModelClass());
    }

    public function recordStatusChange($newStatus, $changedBy = null, $reason = null)
    {
        $oldStatus = $this->status ?? 'new';
        if ($oldStatus !== $newStatus || $this->statusHistory()->count() === 0) {
            $this->statusHistory()->create([
                'old_status' => $oldStatus,
                'new_status' => $newStatus,
                'changed_by' => $changedBy,
                'change_reason' => $reason,
            ]);
            $this->update(['status' => $newStatus]);
        }
    }
}