<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\isInstanceOf;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        if ($products->isEmpty()) session()->flash('noProduct', true);
        return view('products.index', ['products' => Product::all()]);
    }

    public function show(Product $product){
        return view('products.show', ['products' => collect([$product])]);
    }

    public function create(){
        return view('products.create');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(ProductRequest $request, Product $product){
        $previousName = $product->name;
        $validatedData = $request->validated();
        $product->update($validatedData);
        session()->flash('success', 'Product "'.$previousName.'" was updated successfully!');
        return to_route('products.index');
    }

    public function destroy(Product $product){
        Product::destroy($product->id);
        session()->flash('success', 'Product "'.$product->name.'" was deleted successfully!');
        return to_route('products.index');
    }

    public function store(ProductRequest $request){
        $validatedData = $request->validated();
        Product::create($validatedData);
        session()->flash('success', 'Product "'.$validatedData['name'].'" was added successfully!');
        return to_route('products.index');
    }
}
