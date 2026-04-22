<?php

namespace App\Enums;

enum MailRequestStatus: string
{
    case NEW = 'new';
    case CONFIRMED = 'confirmed';
    case PREPARING = 'preparing';
    case SENT = 'sent';
    case DELIVERED = 'delivered';
    case CLOSED = 'closed';
    case CANCELLED = 'cancelled';
}
