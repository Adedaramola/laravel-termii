<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Http;

use Adedaramola\Termii\Concerns\CanSendRequest;
use Adedaramola\Termii\Contracts\TermiiClientContract;
use Adedaramola\Termii\Enums\Method;
use Adedaramola\Termii\Exceptions\TermiiException;
use Adedaramola\Termii\Http\Resources\TokenResource;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

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

    protected function buildRequest(): PendingRequest
    {
        return Http::baseUrl($this->url)
            ->timeout(15)
            ->withUserAgent('Adedaramola_Laravel_Termii_Sdk')
            ->asJson()
            ->acceptJson();
    }
}
