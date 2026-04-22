<?php

namespace App\Enums;

enum UserRole: string
{
    case SUPER_ADMIN = 'super_admin';
    case CAMPAIGN_ADMIN = 'campaign_admin';
    case REVIEWER = 'reviewer';
    case EDITOR = 'editor';
    case SUPPORT_PRESS = 'support_press';
}
