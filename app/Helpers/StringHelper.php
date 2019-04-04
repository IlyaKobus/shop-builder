<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 03.04.2019
 * Time: 17:01
 */

namespace App\Helpers;

use App\Enums\SlugTransliteratorEnum;

abstract class StringHelper
{
    const TRANSLITERATION_TABLES = [
        SlugTransliteratorEnum::RU => ['щ', 'я', 'ё', 'ж', 'х', 'ц', 'ч', 'ш', 'ю', 'я', 'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'ь', 'ы', 'ъ', 'э'],
        SlugTransliteratorEnum::US => ['sch', 'ya', 'yo', 'zh', 'kh', 'ts', 'ch', 'sh', 'yu', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', '', 'y', '', 'e'],
    ];

    /**
     * @param string $value
     * @param string $language
     * @return string|string[]|null
     */
    public static function createSlug(string $value, string $language)
    {
        // build valid slug
        $slug = preg_replace('~-+~', '-',
            trim(
                preg_replace('~[^-\w]+~', '',
                    self::doTransliteration(
                        mb_strtolower(
                            preg_replace('~[^\pL\d]+~u', '-', $value)
                        ), $language)
                )
            )
        );

        if (empty($slug)) {
            $slug = 'n-a';
        }

        return $slug;
    }

    /**
     * @param string $subject
     * @param string $from
     * @param string $to
     * @return mixed
     */
    public static function doTransliteration(string $subject, string $from, string $to = SlugTransliteratorEnum::US)
    {
        return str_replace(
            self::TRANSLITERATION_TABLES[$from] ?? self::TRANSLITERATION_TABLES[SlugTransliteratorEnum::US],
            self::TRANSLITERATION_TABLES[$to] ?? self::TRANSLITERATION_TABLES[SlugTransliteratorEnum::US],
            $subject);
    }
}