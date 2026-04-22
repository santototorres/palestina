<?php

namespace App\Enums;

enum ShopRequestStatus: string
{
    case NEW = 'new';
    case CONFIRMED = 'confirmed';
    case PREPARING = 'preparing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CLOSED = 'closed';
    case CANCELLED = 'cancelled';
}
