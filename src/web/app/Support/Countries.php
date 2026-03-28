<?php

namespace App\Support;

use Symfony\Component\Intl\Countries as IntlCountries;

class Countries
{
    public static function options(): array
    {
        $countries = IntlCountries::getNames();

        $options = [];
        foreach ($countries as $code => $name) {
            $flag = self::flag($code);
            $options[$code] = "{$flag} {$name}";
        }

        return $options;
    }

    public static function flag(string $code): string
    {
        $code = strtoupper($code);

        return implode('', array_map(
            fn (string $char) => mb_chr(ord($char) - ord('A') + 0x1F1E6),
            str_split($code),
        ));
    }
}
