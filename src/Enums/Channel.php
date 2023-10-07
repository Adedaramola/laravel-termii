<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Enums;

enum Channel: string
{
    case DND = 'dnd';
    case EMAIL = 'email';
    case GENERIC = 'generaic';
    case WHATSAPP = 'WhatsApp';
}