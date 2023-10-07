<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Facades;

use Adedaramola\Termii\Contracts\TermiiClientContract;

class Termii extends Facades
{
    public function getFacadeAccessor(): string
    {
        return TermiiClientContract::class;
    }
}
