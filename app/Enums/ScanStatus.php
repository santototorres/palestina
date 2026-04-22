<?php

namespace App\Enums;

enum ScanStatus: string
{
    case PENDING = 'pending';
    case CLEAN = 'clean';
    case FLAGGED = 'flagged';
}
