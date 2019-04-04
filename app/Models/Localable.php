<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 13:43
 */

namespace App\Models;

use App\Helpers\StringHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

abstract class Localable extends Model
{
    /**
     * @param string $key
     * @return mixed|null
     */
    public function getAttribute($key)
    {
        if (in_array($key, $this->getLocalableFieldList())) {
            return $this->getLocaled($key);
        }

        return parent::getAttribute($key);
    }

    /**
     * @return mixed
     */
    abstract protected function getLocalableFieldList();

    /**
     * @param string|null $key
     * @param string|null $languageCode
     * @return |null
     */
    public function getLocaled(?string $key = null, ?string $languageCode = null)
    {
        $language_id = $languageCode ?? App::getLocale();

        $locale = $this->locales
            ->where('language_code', $language_id);

        if (is_null($key)) {
            return $locale;
        }

        if (!$localeInstance = $locale->where('key', $key)->first()) {
            return null;
        }

        return $localeInstance->value;
    }

    /**
     * @param array|null $data
     * @return $this
     */
    public function updateLocales(?array $data)
    {
        if (is_null($data)) {
            return $this;
        }

        foreach ($data as $languageCode => $fieldsGroup) {
            foreach ($fieldsGroup as $name => $value) {
                if ($name === 'slug') {
                    $value = $this->buildSlug($fieldsGroup[$this->getSlugSourceFieldName()] ?? '', $languageCode);
                }
                if (!is_null($value)) {
                    $this->locales()->updateOrCreate(
                        [
                            'language_code' => $languageCode,
                            'key' => $name,
                        ],
                        [
                            'value' => $value,
                        ]
                    );
                }
            }
        }

        return $this;
    }

    /**
     * @param string $value
     * @param string $language
     * @return string|string[]|null
     */
    protected function buildSlug(string $value, string $language)
    {
        $slug = StringHelper::createSlug($value, $language);

        $result = $slug;
        $indexSalt = 1;

        // prevent duplicate slug
        while (
        static::join('translations', 'translations.localable_id', '=', $this->table . '.id')
            ->where('localable_type', static::class)
            ->where('localable_id', '<>', $this->id)
            ->where(['key' => 'slug', 'value' => $result, 'language_code' => $language])
            ->count()
        ) {
            $result = $slug . '_' . $indexSalt++;
        }

        return $result;
    }

    /**
     * @return string
     */
    protected function getSlugSourceFieldName()
    {
        return 'name';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function locales()
    {
        return $this->morphMany(Locale::class, 'localable');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeWithLocales($query)
    {
        return $query->with('locales');
    }

    /**
     * @param $query
     * @param string $key
     * @return mixed
     */
    public function scopejoinLocaleValue($query, string $key)
    {
        $ownTableName = $this->getTable();

        return $query->join('translations', "$ownTableName.id", '=', 'translations.localable_id')
            ->where('localable_type', static::class)
            ->where('language_code', App::getLocale())
            ->where('translations.key', $key)
            ->select("$ownTableName.*", "translations.value as $key");
    }
}
