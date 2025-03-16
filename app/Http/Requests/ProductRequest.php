<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'bail|required|regex:/^[A-Za-z][A-Za-z0-9_-]*$/',
            'price' => 'bail|required|integer|gte:0',
            'available' => ['required', Rule::in(['yes', 'no'])],
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'The name must start with a letter and can only contain letters, numbers, dashes, and underscores.',
            'price.integer' => 'The price must be a whole number.',
            'price.gte' => 'The price must be greater than or equal to 0.',
            'available.in' => 'Availability must be either "yes" or "no".',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $product = $this->route('product'); // Get product from route (only for updates)

            // Check for unique product name when creating a new product
            if ($this->isMethod('post') && Product::where('name', $this->name)->exists()) {
                $validator->errors()->add('name', 'A product with this name already exists.');
            }

            // Check if data is unchanged when updating a product
            if ($this->isMethod('put') && $product && $this->isSameAsCurrent($product)) {
                $validator->errors()->add('general', 'No changes detected.');
            }
        });
    }

    private function isSameAsCurrent(Product $product): bool
    {
        return $product->name === $this->name &&
            $product->price == $this->price &&
            $product->available === $this->available;
    }
}
