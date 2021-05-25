<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenceRequest;
use App\Models\Licence;
use Illuminate\Http\Request;

class LicenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('licences.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('licences.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LicenceRequest $request)
    {
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
        return view('licences.edit', compact('licence'));

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
        return redirect()->route('licences.index');
    }
}
