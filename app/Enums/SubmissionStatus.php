<?php

namespace App\Enums;

enum SubmissionStatus: string
{
    case NEW = 'new';
    case PENDING_REVIEW = 'pending_review';
    case REVIEWED = 'reviewed';
    case VALIDATED_ADMIN = 'validated_admin';
    case INCOMPLETE = 'incomplete';
    case REJECTED = 'rejected';
    case ARCHIVED = 'archived';
}
