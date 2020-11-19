<?php declare(strict_types=1);

namespace App\Http\Requests\Products;

use App\Foundations\RequestFoundation;
use Illuminate\Support\Facades\Gate;

class ProductsUpdateRequest extends RequestFoundation
{
    public function authorize(): bool
    {
        return Gate::allows('products_update');
    }

    public function rules(): array
    {
        return [
            'name' => sprintf('required|unique:products,name,%d', $this->getInt('productId')),
            'price' => 'required|numeric|min:0.01',
            'quantity' => 'required|numeric|min:1',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|min:3',
        ];
    }
}
