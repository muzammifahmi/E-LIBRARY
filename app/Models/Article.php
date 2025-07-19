<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'content', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
