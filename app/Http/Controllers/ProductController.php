<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\QueryFilter\ProductSearch;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = app(Pipeline::class)
            ->send(Product::latest()->newQuery())
            ->through([
                ProductSearch::class,
            ])
            ->thenReturn()
            ->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        do {
            $code = Str::random(16);
        } while (Product::where("code", "=", $code)->first() instanceof Product);
        $code = substr(chunk_split($code, 4, '-'), 0, -1);
        return view('products.create', compact('code'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        Product::create($data);
        session()->flash('success',__('messages.create',['name' => __('messages.product')]));

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return void
     */
    public function update(ProductRequest $request, Product $product)
    {
        $date = $request->validated();
        $product->update($date);
        session()->flash('success',__('messages.update',['name' => __('messages.product')]));

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return void
     */
    public function destroy(Product $product)
    {
        try {
            $product->licences()->delete();
            $product->delete();
            session()->flash('success',__('messages.update',['name' => __('messages.product')]));
        }catch (\Exception $exception)
        {
            session()->flash('error',__('messages.fails',['name' => __('messages.product')]));
        }

        return redirect()->route('products.index');

    }
}
