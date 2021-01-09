@include('auth.head')
@include('client.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">KYC Form</h4>
            </div>
            <div class="card-body">
                @if($kyc ? $kyc->type !='' : '')
                <a class="btn btn-primary" href="{{ route('client.kyc.create') }}">Reset</a>
                @endif
                <br>
            @if(request()->query('id') == '1')
                    @if($kyc ? $kyc->type !=1 : '')
                        <h4>You have filled a form already</h4>
                    @else
                    <h6>Corporate Tenant</h6>
                <br>
                    <form action="" method="post" class="">
                        @csrf
                        <i>Company Information</i>
                        <br>
                        <input type="hidden" name="type" value="1">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ $kyc->company_name ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Company Website</label>
                            <input type="text" name="company_website" id="company_website" value="{{ $kyc->company_website ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Company Business</label>
                            <input type="text" name="company_business" id="company_business" value="{{ $kyc->company_business ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Company Address</label>
                            <input type="text" name="company_address" id="company_address" value="{{ $kyc->company_address ?? '' }}" class="form-control">
                        </div>
                        <i>Director's/CEO's Information</i>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="ceo_name" id="ceo_name" value="{{ $kyc->ceo_name ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="ceo_phone" id="ceo_phone" value="{{ $kyc->ceo_phone ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="ceo_email" id="ceo_email" value="{{ $kyc->ceo_email ?? '' }}" class="form-control">
                        </div>
                        <i>Billing Contact</i>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="bill_name" id="bill_name" value="{{ $kyc->bill_name ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="bill_phone" id="bill_phone" value="{{ $kyc->bill_phone ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="bill_email" id="bill_email" value="{{ $kyc->bill_email ?? '' }}" class="form-control">
                        </div>
                        <i>Administtative Contact</i>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="admin_name" id="admin_name" value="{{ $kyc->admin_name ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="admin_phone" id="admin_phone" value="{{ $kyc->admin_phone ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="admin_email" id="admin_email" value="{{ $kyc->admin_email ?? '' }}" class="form-control">
                        </div>
                        <i>Occupier Details</i>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="occu_name" id="occu_name" value="{{ $kyc->occu_name ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="occu_email" id="occu_email" value="{{ $kyc->occu_email ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="occu_phone" id="occu_phone" value="{{ $kyc->occu_phone ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Position/Role</label>
                            <input type="text" name="occu_position" id="occu_position" value="{{ $kyc->occu_position ?? '' }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        <div class="clearfix"></div>
                    </form>
                    @endif
                @elseif(request()->query('id') == '2')
                    @if($kyc ? $kyc->type !=2: '')
                            <h4>You have filled a form already.</h4>
                        @else
                        <h6>Individual Tenant</h6>
                        <br>
                        <form action="" method="post" class="">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="type" value="2">
                                <label>Nationality</label>
                                <input type="text" name="nationality" id="nationality" value="{{ $kyc->nationality ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" id="state" value="{{ $kyc->state ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" id="city" value="{{ $kyc->city ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Marital Status</label>
                                <input type="text" name="marital_status" id="marital_status" value="{{ $kyc->marital_status ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <input type="text" name="dob" id="dob" value="{{ $kyc->dob ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Number Of Children</label>
                                <input type="text" name="n_o_c" id="n_o_c" value="{{ $kyc->n_o_c ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Spouse</label>
                                <input type="text" name="spouse" id="spouse" value="{{ $kyc->spouse ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Occupation</label>
                                <input type="text" name="occupation" id="occupation" value="{{ $kyc->occupation ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="company_name" id="company_name" value="{{ $kyc->company_name ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Company Address</label>
                                <input type="text" name="company_address" id="company_address" value="{{ $kyc->company_address ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Number Of Servants</label>
                                <input type="text" name="servant" id="servant" value="{{ $kyc->servant ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Present Address</label>
                                <input type="text" name="present_address" id="present_address" value="{{ $kyc->present_address ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Present LandLord - Name & Phone</label>
                                <input type="text" name="present_landlord" id="present_landlord" value="{{ $kyc->present_landlord ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Reason(s) for Vacating Present Resident</label>
                                <input type="text" name="reason_for_vac" id="reason_for_vac" value="{{ $kyc->reason_for_vac ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Property</label>
                                <select name="property_id" id="property_id" class="form-control">
                                    <option value="">Select Property</option>
                                    <option value="1">Another Property</option>
                                </select>
                            </div>
                            <i>Next Of Kin</i>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="nok_name" id="nok_name" value="{{ $kyc->nok_name ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="nok_address" id="nok_address" value="{{ $kyc->nok_address ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="nok_phone" id="nok_phone" value="{{ $kyc->nok_phone ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Relationship</label>
                                <input type="text" name="nok_relationship" id="nok_relationship" value="{{ $kyc->nok_relationship ?? '' }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Name Person to be responsible for payment of rent</label>
                                <input type="text" name="rp_name" id="rp_name" value="{{ $kyc->rp_name ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Relationship with Person to be responsible for payment of rent</label>
                                <input type="text" name="rp_relationship" id="rp_relationship" value="{{ $kyc->rp_relationship ?? '' }}" class="form-control">
                            </div>
                            <i>Refree</i>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="refree_name" id="refree_name" value="{{ $kyc->refree_name ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="refree_address" id="refree_address" value="{{ $kyc->refree_address ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Occupation</label>
                                <input type="text" name="refree_occupation" id="refree_occupation" value="{{ $kyc->refree_occupation ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="refree_email" id="refree_email" value="{{ $kyc->refree_email ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="refree_phone" id="refree_phone" value="{{ $kyc->refree_phone ?? '' }}" class="form-control">
                            </div>
                            <i>Guarantor</i>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="gua_name" id="gua_name" value="{{ $kyc->gua_name ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="gua_address" id="gua_address" value="{{ $kyc->gua_address ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Occupation</label>
                                <input type="text" name="gua_occupation" id="gua_occupation" value="{{ $kyc->gua_occupation ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="gua_email" id="gua_email" value="{{ $kyc->gua_email ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="gua_phone" id="gua_phone" value="{{ $kyc->gua_phone ?? '' }}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            <div class="clearfix"></div>
                        </form>
                    @endif
                @elseif(request()->query('id') == '3')
                    <h6>Owner</h6>
                    <br>
                <h4>No Owner form yet</h4>
{{--                    <form action="" method="post" class="">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" name="type" value="3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label></label>--}}
{{--                            <input type="text" name="" id="" class="form-control">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label></label>--}}
{{--                            <input type="text" name="" id="" class="form-control">--}}
{{--                        </div>--}}
{{--                    </form>--}}
                @else
                Check Url!
                @endif

            </div>
        </div>
    </div>
</div>

@include('auth.foot')
