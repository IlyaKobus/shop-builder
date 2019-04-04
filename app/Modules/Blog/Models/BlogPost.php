<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 10:51
 */

namespace App\Modules\Blog\Models;

use App\Models\Imagable;
use App\Models\Localable;

class BlogPost extends Localable
{
    use Imagable;

    protected $fillable = [
        'slug',
        'image',
    ];
    private $localable = [
        'title',
        'description',
        'meta_title',
    ];

    /**
     * @param array $categories
     * @return $this
     */
    public function updateCategories(array $categories)
    {
        $this->categories()->sync($categories);
        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class);
    }

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
