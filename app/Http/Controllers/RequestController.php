<?php

namespace App\Http\Controllers;

use App\Models\RequestComment;
use Illuminate\Http\Request;

class RequestController extends Controller
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
            return view('client.request');
        }
        elseif ($user->hasRole('tenant')){
            $requests = \App\Models\Request::where('user_id',auth()->user()->id)->get();
            return view('tenant.request',[
                'requests' => $requests
            ]);
        }
        elseif ($user->hasRole('senior-property-manager')){
            $requests = \App\Models\Request::all();
            return view('spm.request',[
                'requests' => $requests
            ]);
        }
        elseif ($user->hasRole('property-manager')){
            return view('pm.request');
        }
        elseif ($user->hasRole('facility-manager')){
            $requests = \App\Models\Request::all();
            return view('fm.request',[
                'requests' => $requests
            ]);        }
        elseif ($user->hasRole('accountant')){
            return view('act.request');
        }
        elseif ($user->hasRole('ceo')){
            return view('ceo.request');
        }
        elseif ($user->hasRole('superadmin')){
            return view('superadmin.request');
        }
        else{
            return 'Error 404';
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
        $requestx = new \App\Models\Request();
        $requestx->user_id = auth()->user()->id;
        $requestx->title = $request->title;
        $requestx->body = $request->body;
        $requestx->save();
        return back()->with('success','Request made successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment_store(Request $request)
    {
        $complain = new RequestComment();
        $complain->request_id = $request->id;
        $complain->comment = $request->comment;
        $complain->save();
        return back()->with('success','Comment made successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(\App\Models\Request $request)
    {
        $user = auth()->user();

        if ($user->hasRole('client')){
            return view('client.request_show',[
                'request' => $request
            ]);
        }
        elseif ($user->hasRole('tenant')){
            return view('tenant.request_show',[
                'request' => $request
            ]);
        }
        elseif ($user->hasRole('senior-property-manager')){
            return view('spm.request_show',[
                'request' => $request
            ]);
        }
        elseif ($user->hasRole('property-manager')){
            return view('pm.request_show',[
                'request' => $request
            ]);
        }
        elseif ($user->hasRole('facility-manager')){
            return view('fm.request_show',[
                'request' => $request
            ]);
        }
        elseif ($user->hasRole('accountant')){
            return view('act.request_show',[
                'request' => $request
            ]);
        }
        elseif ($user->hasRole('ceo')){
            return view('ceo.request_show',[
                'request' => $request
            ]);
        }
        elseif ($user->hasRole('superadmin')){
            return view('superadmin.request_show',[
                'request' => $request
            ]);
        }
        else{
            return 'Error 404';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
