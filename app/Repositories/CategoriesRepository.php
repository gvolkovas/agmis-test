<?php declare(strict_types=1);

namespace App\Repositories;

use App\Foundations\RepositoryFoundation;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriesRepository extends RepositoryFoundation
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function findCategoryWithProducts(int $categoryId): Category
    {
        /** @var Category $category */
        $category = $this->getQueryBuilder()
            ->with([
                'products' => static function (HasMany $query) {
                    //Saving bandwidth by selecting less data
                    $query->select('id', 'category_id', 'name');
                }
            ])
            ->findOrFail($categoryId);

        return $category;
    }
}
