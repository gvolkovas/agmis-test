<?php declare(strict_types=1);

namespace App\Http\Requests\Products;

use App\Foundations\RequestFoundation;
use Illuminate\Support\Facades\Gate;

class ProductsStoreRequest extends RequestFoundation
{
    public function authorize(): bool
    {
        return Gate::allows('products_store');
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric|min:0.01',
            'quantity' => 'required|numeric|min:1',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|min:3',
        ];
    }
}
