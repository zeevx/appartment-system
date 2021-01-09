@include('auth.head')
@include('spm.menu')
@include('auth.alert')


<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create a new message</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('spm.messages.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <!-- Subject Form Input -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject"
                                   value="{{ old('subject') }}">
                        </div>

                        <!-- Message Form Input -->
                        <div class="form-group">
                            <label class="control-label">Message</label>
                            <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                        </div>

                        @if($users->count() > 0)
                            <div class="checkbox">
                                @foreach($users as $user)
                                    @if(!$user->hasRole('superadmin'))
                                        <label title="{{ $user->name }}">
                                            <input type="checkbox" name="recipients[]" value="{{ $user->id }}">
                                            {!!$user->name!!}
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                    @endif

                    <!-- Submit Form Input -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('auth.foot')
