
@include('layouts.appy')
<div class="page-header header-filter" style="background-image: url('{{url('house_bg.jpeg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <br>
        <br>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <br>
        <br>
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                        <h4 class="card-title">{{ __('Email Verification') }}</h4>
                        </div>
                    <div class="card-body p-4">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-primary">
                            <span class="material-icons">arrow_right_alt</span>  {{ __('Resend') }}
                        </button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.appx')































