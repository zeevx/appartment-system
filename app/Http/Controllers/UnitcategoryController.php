<?php

namespace App\Http\Controllers;

use App\Models\Unitcategory;
use Illuminate\Http\Request;

class UnitcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $unitcats = Unitcategory::all();
        return view('spm.unitcat',[
            'unitcats' => $unitcats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
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
        Unitcategory::create($request->all());
        return back()->with('success', 'Unit Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unitcategory  $unitcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Unitcategory $unitcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unitcategory  $unitcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Unitcategory $unitcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unitcategory  $unitcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unitcategory $unitcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unitcategory  $unitcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unitcategory $unitcategory)
    {
        //
    }
}
