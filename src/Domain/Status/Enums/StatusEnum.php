<?php

declare(strict_types=1);


namespace Domain\Status\Enums;

use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;
use function Laravel\Prompts\select;

enum StatusEnum: string implements EnumsDefinition
{
    use EnumEnhancements;

    case ENABLED             = 'enabled';
    case DISABLED            = 'disabled';
    case INACTIVE            = 'inactive';
    case SENT                = 'sent';
    case RECEIVED            = 'received';
    case IN_PROGRESS         = 'in-progress';
    case READY_TO_SHIP       = 'ready-to-ship';
    case SHIPPED             = 'shipped';
    case ARRIVED             = 'arrived';
    case CANCELLED           = 'cancelled';
    case AWAITING_SHIPMENT   = 'awaiting-shipment';
    case REGISTERED          = 'registered';
    case RETRIEVED           = 'retrieved';
    case LATE                = 'late';
    case PAYMENT_IN_PROGRESS = 'payment-in-progress';
    case PAYMENT_MADE        = 'payment-made';


    public function label(): string
    {
        return __('displays.status.' . $this ->value . '.label');
    }

    public function description($number = 1): string
    {
        return trans_choice('displays.status.' . $this ->value . '.description', $number);
    }

    /**
     * @return string
     */
    public function color(): string
    {
        return match ($this) {
            self::IN_PROGRESS, self::AWAITING_SHIPMENT      => "amber black-text",
            self::ENABLED, self::SENT, self::ARRIVED        => "green white-text",
            self::DISABLED, self::INACTIVE, self::CANCELLED => "red white-text",
            self::RECEIVED, self::READY_TO_SHIP             => "blue white-text",
            self::PAYMENT_IN_PROGRESS                       => "orange lighten-2 black-text",
            self::PAYMENT_MADE                              => "light-green white-text",
            self::REGISTERED                                => "indigo white-text",
            self::SHIPPED                                   => "deep-orange white-text",
            self::RETRIEVED                                 => "light-blue white-text",
            self::LATE                                      => "lime darken-1 white-text",
        };
    }

    public function getData(): array
    {
        return [
            "value"       => $this->value,
            "label"       => $this->label(),
            "description" => $this->description(),
            "color"       => $this->color(),
        ];
    }

    public static function getStatusValuesFor(string $type): ?array
    {
        $method = $type.'Status';

        if (method_exists(self::class, $method)) {
            $statusValues =  collect(self::values()) ->map(function ($item) use ($method) {
                if (str_contains_any($item, self::$method())) {
                    return $item;
                }

                return null;
            }) ->toArray();

            return filtered_array($statusValues);
        }

        return null;
    }

    public static function getStatusDataFor(string $type): ?array
    {
        $method = $type.'Status';

        if (method_exists(self::class, $method)) {
            $statusData = collect(self::cases()) ->map(function ($item) use ($method) {
                if (str_contains_any($item ->value, self::$method())) {
                    return $item ->getData();
                }

                return null;
            }) ->toArray();

            return filtered_array($statusData);
        }

        return null;
    }

    protected static function agencyStatus(): array
    {
        return [
            self::ENABLED ->value,
            self::DISABLED ->value
        ];
    }

    protected static function exchangeRateStatus(): array
    {
        return [
            self::ENABLED ->value,
            self::DISABLED ->value
        ];
    }

    protected static function transferFeeStatus(): array
    {
        return [
            self::ENABLED ->value,
            self::DISABLED ->value
        ];
    }

    protected static function shippingFeeStatus(): array
    {
        return [
            self::ENABLED ->value,
            self::DISABLED ->value
        ];
    }

    protected static function transferStatus(): array
    {
        return [
            self::SENT ->value,
            self::RECEIVED ->value,
            self::CANCELLED ->value,
        ];
    }

    protected static function shippingProgramStatus(): array
    {
        return [
            self::ENABLED ->value,
            self::DISABLED ->value
        ];
    }

    protected static function shippingStatus(): array
    {
        return [
            self::IN_PROGRESS->value,
            self::READY_TO_SHIP->value,
            self::SHIPPED->value,
            self::ARRIVED->value,
            self::CANCELLED->value,
            self::LATE->value,
        ];
    }

    protected static function packageStatus(): array
    {
        return [
            self::AWAITING_SHIPMENT->value,
            self::READY_TO_SHIP->value,
            self::SHIPPED->value,
            self::RETRIEVED->value,
        ];
    }

    protected static function paymentStatus(): array
    {
        return [
            self::PAYMENT_IN_PROGRESS->value,
            self::PAYMENT_MADE->value,
        ];
    }
}
