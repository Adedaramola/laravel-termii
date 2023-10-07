<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Http\Requests;

use Adedaramola\Termii\Enums\Channel;
use Adedaramola\Termii\Enums\MessageType;

class SendTokenRequest
{
    public function __construct(
        public readonly MessageType $messageType,
        public readonly string $to,
        public readonly string $from,
        public readonly Channel $channel,
        public readonly int $pinAttempts,
        public readonly int $pinTimeToLive,
        public readonly int $pinLength,
        public readonly string $pinPlaceholder,
        public readonly string $messageText,
    ) {}

    public function toArray(): array
    {
        return [
            'message_type' => $this->messageType->value,
            'to' => $this->to,
            'from' => $this->from,
            'channel' => $this->channel->value,
            'pin_attempts' => $this->pinAttempts,
            'pin_time_to_live' => $this->pinTimeToLive,
            'pin_length' => $this->pinLength,
            'pin_placeholder' => $this->pinPlaceholder,
            'message_text' => $this->messageText,
        ];
    }
}