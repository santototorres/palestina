<?php

namespace App\Enums;

enum VolunteerStatus: string
{
    case NEW = 'new';
    case CONTACTED = 'contacted';
    case IN_PROGRESS = 'in_progress';
    case ACTIVE = 'active';
    case CLOSED = 'closed';
}
