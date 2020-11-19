<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Product
 * @package App\Models
 * @property int $category_id
 * @property int $quantity
 * @property float $price
 * @property string $name
 * @property string $description
 */
class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'quantity',
        'price',
        'description'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
