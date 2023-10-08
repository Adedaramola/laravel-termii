<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Http;

use Adedaramola\Termii\Concerns\CanSendRequest;
use Adedaramola\Termii\Contracts\TermiiClientContract;
use Adedaramola\Termii\Http\Resources\TokenResource;

class TermiiClient implements TermiiClientContract
{
    use CanSendRequest;

    public function __construct(
        protected readonly string $url,
        protected readonly string $apiKey,
    ) {
    }

    public function token(): TokenResource
    {
        return new TokenResource($this);
    }
}
