<?php declare(strict_types=1);

namespace App\Http\Requests\Categories;

use App\Foundations\RequestFoundation;
use Illuminate\Support\Facades\Gate;

class CategoriesStoreRequest extends RequestFoundation
{
    public function authorize(): bool
    {
        return Gate::allows('categories_store');
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3|unique:categories,name',
        ];
    }
}
