<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 26.03.2019
 * Time: 21:36
 */

namespace App\Helpers;

use App\Modules\Currency\Models\Currency;

abstract class MathHelper
{
    /**
     * @param $from
     * @param $to
     * @param int $value
     * @return int|string
     */
    public static function convertCurrency($from, $to, int $value = 1)
    {
        if ($id = (int)$from) {
            $fromCurrency = Currency::find($id);
        } elseif (is_string($from)) {
            $fromCurrency = Currency::where('code', $from)->first();
        }

        if ($id = (int)$to) {
            $toCurrency = Currency::find($id);
        } elseif (is_string($to)) {
            $toCurrency = Currency::where('code', $to)->first();
        }

        if (!$fromCurrency || !$toCurrency || $from === $to) {
            return $value;
        }

        // TODO possible rounding falls??
        $result = number_format(($value / $fromCurrency->value) * $toCurrency->value, 2);

        return $result;
    }
}
