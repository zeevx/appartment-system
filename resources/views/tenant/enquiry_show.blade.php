@include('auth.head')
@include('tenant.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Enquiries</h4>
            </div>
            <div class="card-body">
                <br>
                <h3>
                    {{ $enquiry->title }}
                </h3>
                <hr>
                <h4>
                    <b>{{ $enquiry->body }}</b>
                </h4>
                <br>
                <h4>
                    @forelse($enquiry->comments as $comment)
                        <div class="bg-secondary text-white px-2 pt-2">{{ $comment->comment }} <p class="small">"{{ $comment->created_at }}"</p></div>
                    @empty
                        <h5 class="pt-5">No comment yet</h5>
                    @endforelse
                </h4>
                <br>
                <hr>
                <form action="{{ route('enquiry.comment.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Comment</label>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="comment"></textarea>
                        </div>
                        <input type="hidden" name="id" value="{{ $enquiry->id }}">
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('auth.foot')
