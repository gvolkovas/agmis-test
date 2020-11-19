<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CategoriesIndexRequest;
use App\Http\Requests\Categories\CategoriesStoreRequest;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\RedirectResponse;
use App\UseCases\Categories\StoreOrUpdateCategory;
use Illuminate\Support\Facades\Gate;

class CategoryController
{
    private CategoriesRepository $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index(CategoriesIndexRequest $request)
    {
        return view('categories.index', [
                'categories' => $this->categoriesRepository->getIndexPagination($request->getPaginationCriteria())
            ]);
    }

    public function show(int $categoryId)
    {
        if (!Gate::allows('categories_show')) {
            abort(403);
        }

        return view('categories.show', [
            'category' => $this->categoriesRepository->findCategoryWithProducts($categoryId)
        ]);
    }

    public function create()
    {
        if (!Gate::allows('categories_create')) {
            abort(403);
        }

        return view('categories.create');
    }

    public function store(
        CategoriesStoreRequest $request,
        StoreOrUpdateCategory $storeOrUpdateCategory
    ): RedirectResponse {
        $storeOrUpdateCategory->handle($request->toArray());

        return redirect()->route('categories.index')->with('success', 'Successfully created category!');
    }
}
