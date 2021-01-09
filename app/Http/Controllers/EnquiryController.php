<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\EnquiryComment;
use Illuminate\Http\Request;

class EnquiryController extends Controller
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
            $enquiries = Enquiry::where('user_id',auth()->user()->id)->get();
            return view('client.enquiry',[
                'enquiries' => $enquiries
            ]);        }
        elseif ($user->hasRole('tenant')){
            $enquiries = Enquiry::where('user_id',auth()->user()->id)->get();
            return view('tenant.enquiry',[
                'enquiries' => $enquiries
            ]);
        }
        elseif ($user->hasRole('senior-property-manager')){
            return view('spm.enquiry');
        }
        elseif ($user->hasRole('property-manager')){
            return view('pm.enquiry');
        }
        elseif ($user->hasRole('facility-manager')){
            return view('fm.enquiry');
        }
        elseif ($user->hasRole('accountant')){
            return view('act.enquiry');
        }
        elseif ($user->hasRole('ceo')){
            return view('ceo.enquiry');
        }
        elseif ($user->hasRole('superadmin')){
            return view('superadmin.enquiry');
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
        $enquiry = new Enquiry();
        $enquiry->user_id = auth()->user()->id;
        $enquiry->title = $request->title;
        $enquiry->body = $request->body;
        $enquiry->save();
        return back()->with('success','Enquiry submitted successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment_store(Request $request)
    {
        $complain = new EnquiryComment();
        $complain->enquiry_id = $request->id;
        $complain->comment = $request->comment;
        $complain->save();
        return back()->with('success','Comment made successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Enquiry $enquiry)
    {
        $user = auth()->user();

        if ($user->hasRole('client')){
            return view('client.enquiry_show',[
                'enquiry' => $enquiry
            ]);
        }
        elseif ($user->hasRole('tenant')){
            return view('tenant.enquiry_show',[
                'enquiry' => $enquiry
            ]);
        }
        elseif ($user->hasRole('senior-property-manager')){
            return view('spm.enquiry_show',[
                'enquiry' => $enquiry
            ]);
        }
        elseif ($user->hasRole('property-manager')){
            return view('pm.enquiry_show',[
                'enquiry' => $enquiry
            ]);
        }
        elseif ($user->hasRole('facility-manager')){
            return view('fm.enquiry_show',[
                'enquiry' => $enquiry
            ]);
        }
        elseif ($user->hasRole('accountant')){
            return view('act.enquiry_show',[
                'enquiry' => $enquiry
            ]);
        }
        elseif ($user->hasRole('ceo')){
            return view('ceo.enquiry_show',[
                'enquiry' => $enquiry
            ]);
        }
        elseif ($user->hasRole('superadmin')){
            return view('superadmin.enquiry_show',[
                'enquiry' => $enquiry
            ]);
        }
        else{
            return 'Error 404';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }
}
