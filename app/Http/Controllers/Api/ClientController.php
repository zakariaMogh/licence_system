<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Licence;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'email' => 'required|email|max:60',
            'phone' => 'required|string|max:60',
            'company_name' => 'required|string|max:60',
            'hard_drive_number' => 'string|max:60'
//            'serial_key' => 'required|integer|exists:licences,id',
        ]);

        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        if (!$request->hard_drive_number)
        {
            return response(['error' => 'This is a forbidden request'], 403);
        }

        if ($request->code)
        {
            $product = Product::where('code', $request->code)->first();
            if (!$product){
                return response(['error' => 'This is a forbidden request'], 403);
            }
        }else{
            return response(['error' => 'This is a forbidden request'], 403);
        }

        $licence = Licence::where('serial_key', $request->serial_key)->whereHas('product', function ($query) use ($request)
        {
            $query->where('code', $request->code);
        })->first();
        if (!$licence || $licence->is_active && $licence->hard_drive_number != $request->hard_drive_number)
        {
            return response(['error' => 'Clé de série introuvable'], 402);
        }

        if (!$licence->is_active)
        {
            $licence->client()->create($request->all());
            $licence->update(['is_active' => true, 'hard_drive_number' => $request->hard_drive_number]);
        }


        return response(['success' => 'Votre produit a été activé avec succès'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
