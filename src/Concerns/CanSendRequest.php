<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Concerns;

use Adedaramola\Termii\Enums\Method;
use Adedaramola\Termii\Exceptions\TermiiException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

trait CanSendRequest
{
    public function send(Method $method, string $uri, array $options = []): Response
    {
        $response = $this->buildRequest()->send(
            method: $method->value,
            url: $uri,
            options: array_merge($options, [
                'api_key' => $this->apiKey,
            ]),
        );

        if ($response->failed()) {
            throw new TermiiException($response);
        }

        return $response;
    }

    public function buildRequest(): PendingRequest
    {
        return Http::baseUrl($this->url)
            ->timeout(15)
            ->withUserAgent('Adedaramola/Laravel-Termii')
            ->asJson()
            ->acceptJson();
    }
}
