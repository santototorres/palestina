<?php

namespace App\Enums;

enum DocumentType: string
{
    case SIGNED_FORM_SCAN = 'signed_form_scan';
    case SIGNED_FORM_PHOTO = 'signed_form_photo';
    case SHIPPING_PROOF = 'shipping_proof';
    case SUPPORT_DOCUMENT = 'support_document';
    case OTHER = 'other';
}
