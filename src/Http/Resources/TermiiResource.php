<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Http\Resources;

use Adedaramola\Termii\Contracts\TermiiClientContract;

abstract class TermiiResource
{
    public function __construct(
        protected readonly TermiiClientContract $client,
    ) {
    }
}
