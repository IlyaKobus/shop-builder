<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 11.03.19
 * Time: 13:36
 */

namespace App\Modules\Product\Models;

use App\Enums\FilePathEnum;
use App\Helpers\StorageHelper;
use App\Models\Localable;
use App\Modules\Category\Models\Category;
use App\Modules\Currency\Models\Currency;
use App\Modules\Layout\Models\Layout;
use App\Modules\Manufacturer\Models\Manufacturer;

class Product extends Localable
{
    protected $fillable = [
        'model',
        'main_image',
        'price',
        'quantity',
        'weight',
        'dimensions',
        'status',
        'sort_order',
        'currency_id',
        'is_discounted',
        'discount_price',
        'layout_id',
    ];

    private $localable = [
        'name',
        'description',
        'meta_tag_title',
        'meta_tag_description',
        'meta_tag_keywords',
        'slug',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function layout()
    {
        return $this->belongsTo(Layout::class);
    }

    /**
     * @param $value
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getMainImageAttribute($value)
    {
        return $value ?? config('dashboard.default_image_url');
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getPriceAttribute($value)
    {
        // TODO implement currencies converter using user settings about current currency
//        $priceInDefaultCurrency = $this->price * $this->currency->value;

        return $value;
    }

    /**
     * @param array|null $data
     * @return $this
     */
    public function updateAttributes(?array $data)
    {
        if (is_null($data)) {
            return $this;
        }

        $attributeIds = array_map(function ($attr) {
            return $attr['id'];
        }, $data);

        $this->attributes()
            ->whereNotIn('attribute_id', $attributeIds)
            ->delete();


        foreach ($data as $attr) {
            /** @var ProductAttribute $attribute */
            $attribute = $this->attributes()->firstOrCreate(
                [
                    'attribute_id' => $attr['id']
                ]
            );

            $attribute
                ->updateLocales($attr['locales'])
                ->save();
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    /**
     * @param array|null $data
     * @return $this
     */
    public function updateOptions(?array $data)
    {
        if (is_null($data)) {
            return $this;
        }

        $this->options()
            ->whereNotIn('id', array_keys($data))
            ->delete();

        foreach ($data as $id => $opt) {
            /** @var ProductOption $option */
            $option = $this->options()->firstOrCreate(['option_id' => $id]);

            $option->updateValues($opt['values'])->save();
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }

    /**
     * @param array|null $data
     * @return $this
     */
    public function updateCategories(?array $data)
    {
        if (!is_null($data)) {
            $this->categories()->sync($data);
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @param array $files
     * @param array|null $data
     * @return $this
     */
    public function updateImages(array $files, ?array $data = null)
    {
        // TODO try to make it easier
        foreach ($files as $name => $file) {
            if ($name === 'main_image') {
                if ($file) {
                    StorageHelper::updateFile($name, $file, $this, FilePathEnum::IMAGE_PRODUCT);
                }
            }

            if (isset($files['images'])) {
                $imageIds = array_map(function ($image) {
                    return $image['id'] ?? null;
                }, $files['images']);


                $this->images()
                    ->whereNotIn('id', $imageIds)
                    ->delete();

                foreach ($files['images'] as $key => $productImage) {
                    $productImageData = array_merge($productImage, $data[$key]);

                    if ($image = $productImageData['image']) {
                        $productImageData['url'] = StorageHelper::updateFile('image', $productImageData['image'], null,
                            FilePathEnum::IMAGE_PRODUCT);
                    }

                    isset($productImageData['id']) ?
                        $this->images()->where('id', $productImageData['id'])->update($productImageData) :
                        $this->images()->create($productImageData);
                }
            }
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
