<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintComment;
use Illuminate\Http\Request;

class ComplaintController extends Controller
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
            return view('client.complaint');
        }
        elseif ($user->hasRole('tenant')){
            $complains = Complaint::where('user_id',auth()->user()->id)->get();
            return view('tenant.complaint',[
                'complains' => $complains
            ]);
        }
        elseif ($user->hasRole('senior-property-manager')){
            return view('spm.complaint');
        }
        elseif ($user->hasRole('property-manager')){
            return view('pm.complaint');
        }
        elseif ($user->hasRole('facility-manager')){
            return view('fm.complaint');
        }
        elseif ($user->hasRole('accountant')){
            return view('act.complaint');
        }
        elseif ($user->hasRole('ceo')){
            return view('ceo.complaint');
        }
        elseif ($user->hasRole('superadmin')){
            return view('superadmin.complaint');
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
        $complain = new Complaint();
        $complain->user_id = auth()->user()->id;
        $complain->title = $request->title;
        $complain->body = $request->body;
        $complain->status = 'Open';
        $complain->save();
        return back()->with('success','Complaint made successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment_store(Request $request)
    {
        $complain = new ComplaintComment();
        $complain->complaint_id = $request->id;
        $complain->comment = $request->comment;
        $complain->save();
        return back()->with('success','Comment made successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return string
     */
    public function show(Complaint $complaint)
    {
        $user = auth()->user();

        if ($user->hasRole('client')){
            return view('client.complaint_show',[
                'complaint' => $complaint
            ]);
        }
        elseif ($user->hasRole('tenant')){
            return view('tenant.complaint_show',[
                'complaint' => $complaint
            ]);
        }
        elseif ($user->hasRole('senior-property-manager')){
            return view('spm.complaint_show',[
                'complaint' => $complaint
            ]);
        }
        elseif ($user->hasRole('property-manager')){
            return view('pm.complaint_show',[
                'complaint' => $complaint
            ]);
        }
        elseif ($user->hasRole('facility-manager')){
            return view('fm.complaint_show',[
                'complaint' => $complaint
            ]);
        }
        elseif ($user->hasRole('accountant')){
            return view('act.complaint_show',[
                'complaint' => $complaint
            ]);
        }
        elseif ($user->hasRole('ceo')){
            return view('ceo.complaint_show',[
                'complaint' => $complaint
            ]);
        }
        elseif ($user->hasRole('superadmin')){
            return view('superadmin.complaint_show',[
                'complaint' => $complaint
            ]);
        }
        else{
            return 'Error 404';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
