<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 10:52
 */

namespace App\Modules\Blog\Models;

use App\Models\Imagable;
use App\Models\Localable;

class BlogCategory extends Localable
{
    use Imagable;

    public $table = 'blog_categories';
    protected $fillable = [
        'image',
        'slug',
    ];
    private $localable = [
        'title',
        'description',
        'meta_title',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(BlogPost::class);
    }

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
