<?php declare(strict_types=1);

namespace App\UseCases\Products;

use App\Models\Product;
use App\Repositories\ProductsRepository;
use Illuminate\Database\Eloquent\Model;

class StoreOrUpdateProduct
{
    private ProductsRepository $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function handle(array $data, ?int $categoryId = null): Product
    {
        /** @var Product $product */
        $product = $this->getModel($categoryId);
        $product->name = $data['name'];
        $product->quantity = $data['quantity'];
        $product->price = $data['price'];
        $product->category_id = $data['category_id'] ? $data['category_id'] : null;
        $product->description = $data['description'] ? $data['description'] : null;
        $product->save();

        return $product;
    }

    private function getModel(?int $productId = null): Model
    {
        return $productId ? $this->productsRepository->findById($productId) : new Product();
    }
}
