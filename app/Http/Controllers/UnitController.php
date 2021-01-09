<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Unit;
use App\Models\Unitcategory;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('client')){
            return back()->with('failure', 'Permission Denied!');
        }
        elseif ($user->hasRole('tenant')){
            return back()->with('failure', 'Permission Denied!');

        }
        elseif ($user->hasRole('senior-property-manager')){
            $units = Unit::all();
            $unitcategories = Unitcategory::all();
            $properties = Property::all();
            return view('spm.unit',[
                'units' => $units,
                'unitcategories' => $unitcategories,
                'properties' => $properties
            ]);
        }
        elseif ($user->hasRole('property-manager')){
            $units = Unit::all();
            return view('pm.unit',[
                'units' => $units
            ]);
        }
        elseif ($user->hasRole('facility-manager')){
            $units = Unit::all();
            return view('fm.unit',[
                'units' => $units
            ]);
        }
        elseif ($user->hasRole('accountant')){
            return back()->with('failure', 'Permission Denied!');
        }
        elseif ($user->hasRole('ceo')){
            return back()->with('failure', 'Permission Denied!');
        }
        elseif ($user->hasRole('superadmin')){
            return back()->with('failure', 'Permission Denied!');
        }
        else{
            return back()->with('failure', 'Permission Denied!');
        }
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Unit::create($request->all());
        return back()->with('success', 'Residential Unit Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
