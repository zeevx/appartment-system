<h3>Send Message</h3>
<form action="{{ route('tenant.messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}

    <!-- Message Form Input -->
    <div class="form-group">
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
</form>
