<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Enums;

enum MessageType: string
{
    case NUMERIC = 'NUMERIC';
    case ALPHA_NUMERIC = 'ALPHANUMERIC';
}
