<?php

namespace App\Services;

use App\Models\AnalyticsEvent;
use Illuminate\Http\Request;

class AnalyticsService
{
    /**
     * Log a frontend or backend analytics event.
     *
     * @param string \$eventName
     * @param array \$metaData
     * @param Request|null \$request
     * @param string|null \$entityType
     * @param string|null \$entityId
     * @return AnalyticsEvent
     */
    public function logEvent(string \$eventName, array \$metaData = [], ?Request \$request = null, ?string \$entityType = null, ?string \$entityId = null): AnalyticsEvent
    {
        \$sessionId = \$request ? \$request->session()->getId() : session()->getId();

        return AnalyticsEvent::create([
            'event_name' => \$eventName,
            'session_id' => \$sessionId,
            'entity_type' => \$entityType,
            'entity_id' => \$entityId,
            'meta_json' => \$metaData,
        ]);
    }
}
