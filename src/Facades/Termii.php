<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Facades;

use Adedaramola\Termii\Contracts\TermiiClientContract;
use Illuminate\Support\Facades\Facade;

class Termii extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return TermiiClientContract::class;
    }
}
