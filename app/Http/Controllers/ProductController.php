<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Products\ProductsIndexRequest;
use App\Http\Requests\Products\ProductsStoreRequest;
use App\Repositories\CategoriesRepository;
use App\Repositories\ProductsRepository;
use App\UseCases\Products\StoreOrUpdateProduct;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class ProductController
{
    private ProductsRepository $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function index(ProductsIndexRequest $request)
    {
        return view('products.index', [
                'products' => $this->productsRepository->getIndexPagination($request->getPaginationCriteria())
            ]);
    }

    public function show(int $productId)
    {
        if (!Gate::allows('products_show')) {
            abort(403);
        }

        return view('products.show', [
            'product' => $this->productsRepository->findWithCategory($productId)
        ]);
    }

    public function fetch(int $id): JsonResponse
    {
        return response()
            ->json(
                $this->productsRepository->findById($id)
            );
    }

    public function create(CategoriesRepository $categoriesRepository)
    {
        if (!Gate::allows('products_create')) {
            abort(403);
        }

        return view('products.create', [
            'categories' => $categoriesRepository->getAll()
        ]);
    }

    public function store(
        ProductsStoreRequest $request,
        StoreOrUpdateProduct $storeOrUpdateProduct
    ): RedirectResponse {
        $storeOrUpdateProduct->handle($request->toArray());

        return redirect()->route('products.index')->with('success', 'Successfully created product!');
    }
}
