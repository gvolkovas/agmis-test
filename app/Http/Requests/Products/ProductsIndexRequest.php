<?php declare(strict_types=1);

namespace App\Http\Requests\Products;

use App\Foundations\PaginationCriteria;
use App\Foundations\RequestFoundation;
use App\Interfaces\PaginationCriteriaInterface;
use Illuminate\Support\Facades\Gate;

class ProductsIndexRequest extends RequestFoundation
{
    public function authorize(): bool
    {
        return Gate::allows('products_index');
    }

    public function rules(): array
    {
        return [];
    }

    public function getPaginationCriteria(): PaginationCriteriaInterface
    {
        return new PaginationCriteria(
            $this->getInt('page') ?? 1,
            $this->getInt('perPage') ?? 25
        );
    }
}
