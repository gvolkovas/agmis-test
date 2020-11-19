<?php declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Models\Category;
use App\Repositories\CategoriesRepository;
use Illuminate\Database\Eloquent\Model;

class StoreOrUpdateCategory
{
    private CategoriesRepository $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function handle(array $data, ?int $categoryId = null): Category
    {
        /** @var Category $category */
        $category = $this->getModel($categoryId);
        $category->name = $data['name'];
        $category->save();

        return $category;
    }

    private function getModel(?int $categoryId = null): Model
    {
        return $categoryId ? $this->categoriesRepository->findById($categoryId) : new Category();
    }
}
