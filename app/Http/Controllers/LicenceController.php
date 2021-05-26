<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenceRequest;
use App\Models\Licence;
use App\Models\Product;
use App\QueryFilter\LicenceSearch;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Str;

class LicenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licences = app(Pipeline::class)
            ->send(Licence::latest()->with('product')->newQuery())
            ->through([
                LicenceSearch::class,
            ])
            ->thenReturn()
            ->paginate(10);
        return view('licences.index', compact('licences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        do {
            $serial_key = Str::random(16);
        } while (Licence::where("serial_key", "=", $serial_key)->first() instanceof Licence);
        $serial_key = substr(chunk_split($serial_key, 4, '-'), 0, -1);

        return view('licences.create', compact('products', 'serial_key'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LicenceRequest $request)
    {
        $product = Product::findOrFail($request->product);
        $product->licences()->create($request->validated());
        session()->flash('success',__('messages.create',['name' => __('messages.licence')]));
        return redirect()->route('licences.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Licence $licence)
    {
        return view('licences.show', compact('licence'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Licence $licence)
    {
        $products = Product::all();
        return view('licences.edit', compact('licence', 'products'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param LicenceRequest $request
     * @param Licence $licence
     * @return void
     */
    public function update(LicenceRequest $request, Licence $licence)
    {
        $product = Product::findOrFail($request->product);
        $licence->product()->associate($product);
        $licence->update($request->validated());
        session()->flash('success',__('messages.update',['name' => __('messages.licence')]));
        return redirect()->route('licences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Licence $licence
     * @return void
     */
    public function destroy(Licence $licence)
    {
        try {
            $licence->client()->delete();
            $licence->delete();
            session()->flash('success',__('messages.update',['name' => __('messages.licence')]));
        }catch (\Exception $exception)
        {
            session()->flash('error',__('messages.fails',['name' => __('messages.licence')]));
        }

        return redirect()->route('licences.index');
    }
}
