

@include('layouts.appy')
<div class="page-header header-filter" style="background-image: url('{{url('house_bg.jpeg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <br>
        <br>
        @error('email')
        <div class="alert alert-danger">
            <div class="container">
                <div class="alert-icon">
                    <i class="material-icons">error_outline</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <span class="text-white font-weight-bolder" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
        </div>
        @enderror
        <br>
        <br>
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Forgot Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                                </div>
                                <input placeholder="Enter Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div align="center">
                            <button type="submit" class="btn btn-primary">
                                <span class="material-icons">arrow_right_alt</span>  {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('layouts.appx')
