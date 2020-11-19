<?php declare(strict_types=1);

namespace App\Repositories;

use App\Foundations\RepositoryFoundation;
use App\Interfaces\PaginationCriteriaInterface;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductsRepository extends RepositoryFoundation
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function findWithCategory(int $productId): Product
    {
        /** @var Product $product */
        $product = $this->getQueryBuilder()
            ->with([
                'category' => static function (BelongsTo $query) {
                    //Saving bandwidth by selecting less data
                    $query->select('id', 'name');
                }
            ])
            ->findOrFail($productId);

        /*
          Could be done with left join to safe bandwidth and not generate multiple queries
          $this->getQueryBuilder()
               ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
               ->select('products.*', 'categories.name as categoryName')
               ->findOrFail($productId);
         */

        return $product;
    }

}
