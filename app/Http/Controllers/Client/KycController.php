<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use Illuminate\Http\Request;

class KycController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $kyc = Kyc::where('user_id', auth()->user()->id)->first();

        return view('client.kyc', [
            'kyc' => $kyc
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $kyc = Kyc::where('user_id', auth()->user()->id)->first();
        $kyc->delete();
        return back()->with('success','KYC Form reset successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Kyc::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $request->all()
        );
        return back()->with('success','KYC Form submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kyc  $kyc
     * @return \Illuminate\Http\Response
     */
    public function show(Kyc $kyc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kyc  $kyc
     * @return \Illuminate\Http\Response
     */
    public function edit(Kyc $kyc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kyc  $kyc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kyc $kyc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kyc  $kyc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kyc $kyc)
    {
        //
    }
}
