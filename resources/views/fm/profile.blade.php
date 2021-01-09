@include('auth.head')
@include('fm.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">View/Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <br>
                        <form action="{{ route('fm.user.update',$user->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Full Name</label>
                                        <input value="{{ $user->name }}" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email Address</label>
                                        <input value="{{ $user->email }}" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone Number</label>
                                        <input value="{{ $user->phone }}" name="phone" type="number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="address" rows="4">{{ $user->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="javascript:;">
                            <img class="img" src="{{ !empty($user->picture)? url('').'/storage/'.$user->picture : url('user.png') }}" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">Facility Manager</h6>
                        <h4 class="card-title">{{ $user->name }}</h4>
                        <p class="card-description">
                            {{ $user->email }}
                        </p>
                        <form action="{{ route('fm.user.update',$user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <label class="font-weight-bold">Change Picture</label>
                            <input type="file" name="picture" id="picture" class="form-control">
                            <button class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('auth.foot')
