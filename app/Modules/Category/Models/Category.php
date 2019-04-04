<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 07.03.19
 * Time: 15:34
 */

namespace App\Modules\Category\Models;

use App\Enums\FilePathEnum;
use App\Models\Imagable;
use App\Models\Localable;
use App\Modules\Layout\Models\Layout;
use Illuminate\Database\Eloquent\Collection;

class Category extends Localable
{
    use Imagable;

    /** @var Collection */
    public $children;
    protected $image_path = FilePathEnum::ICON_CATEGORY;
    protected $appends = [
        'children',
    ];
    protected $fillable = [
        'parent_id',
        'attributes',
        'options',
        'image',
        'layout_id',
    ];
    protected $casts = [
        'attributes' => 'array',
        'options' => 'array',
        'children' => 'array',
    ];
    private $localable = [
        'name',
        'description',
        'meta_tag_title',
        'slug',
    ];

    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->children = new Collection;
    }

    /**
     * @param Collection $categories
     * @return Collection
     */
    public static function buildTree(Collection $categories)
    {

        foreach ($categories as $category) {
            $category->children = $categories->where('parent_id', $category->id);
        }

        return $categories->where('parent_id', null);
    }

    /**
     * @param Collection|null $categories
     * @return Category[]|Collection
     */
    public static function getFinal(?Collection $categories = null)
    {
        if (is_null($categories)) {
            $categories = self::all();
        }

        return $categories->filter(function ($category) {
            return $category->children->isEmpty();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function layout()
    {
        return $this->belongsTo(Layout::class);
    }

    /**
     * @return mixed
     */
    public function getChildrenAttribute()
    {
        return $this->children->values();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * @return bool
     */
    public function isContainProducts()
    {
        $isContainProducts = false;

        if (!$this->products->isEmpty()) {
            $isContainProducts = true;
        }

        $result = function ($categories) use (&$result, &$isContainProducts) {
            foreach ($categories as $category) {
                if (!$category->products->isEmpty()) {
                    $isContainProducts = true;
                }
                if (!$category->children->isEmpty()) {
                    $result($category->children);
                }
            }
        };

        $result($this->children);

        return $isContainProducts;
    }

    /**
     * @return bool
     */
    public function isFinal(): bool
    {
        return $this->children->isEmpty();
    }

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
