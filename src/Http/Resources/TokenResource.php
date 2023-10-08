<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Http\Resources;

use Adedaramola\Termii\Enums\Method;
use Adedaramola\Termii\Http\Requests\SendTokenRequest;
use Illuminate\Http\Client\Response;

class TokenResource extends TermiiResource
{
    public function sendToken(SendTokenRequest $request): Response
    {
        return $this->client->send(
            method: Method::POST,
            uri: '/sms/otp/send',
            options: $request->toArray(),
        );
    }

    public function verifyToken(string $pinId, string $pin): Response
    {
        return $this->client->send(
            method: Method::POST,
            uri: '/sms/otp/verify',
            options: [
                'pin_id' => $pinId,
                'pin' => $pin,
            ],
        );
    }
}
