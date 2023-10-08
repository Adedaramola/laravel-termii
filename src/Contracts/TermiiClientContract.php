<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Contracts;

use Adedaramola\Termii\Enums\Method;
use Adedaramola\Termii\Http\Resources\TokenResource;
use Illuminate\Http\Client\Response;

interface TermiiClientContract
{
    public function token(): TokenResource;
    public function send(Method $method, string $uri, array $options = []): Response;
}
