<?php declare(strict_types=1);

namespace App\Http\Requests\Categories;

use App\Foundations\RequestFoundation;
use Illuminate\Support\Facades\Gate;

class CategoriesUpdateRequest extends RequestFoundation
{
    public function authorize(): bool
    {
        return Gate::allows('categories_update');
    }

    public function rules(): array
    {
        return [
            'name' => sprintf('required|unique:categories,name,%d', $this->getInt('categoryId')),
        ];
    }
}
