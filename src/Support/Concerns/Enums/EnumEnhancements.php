<?php

declare(strict_types=1);


namespace Support\Concerns\Enums;

trait EnumEnhancements
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }

    public static function toArray(): array
    {
        return collect(self::cases())->map(function ($item) {
            return [
                'value'         => $item ->value,
                'label'         => $item ->label(),
                'description'   => $item ->description(),
            ];
        })->toArray();
    }

    /**
     * Returns enum values as an array.
     */
    public static function valueArray(): array
    {
        foreach (self::cases() as $enum) {
            $values[] = $enum->value ?? $enum->name;
        }

        return $values;
    }

    /**
     * Returns enum values as a list.
     */
    public static function valueList(string $separator = ', '): string
    {
        return implode($separator, self::valueArray());
    }

    /**
     * Return value of enum.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this ->value;
    }
}
