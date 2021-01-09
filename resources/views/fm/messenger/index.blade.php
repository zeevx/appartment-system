@include('auth.head')
@include('fm.menu')
@include('auth.alert')



<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Messages</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('fm.messages.create') }}" class="btn btn-primary">Create New Message</a>
                <br>
                @include('fm.messenger.partials.flash')

                @each('fm.messenger.partials.thread', $threads, 'thread', 'fm.messenger.partials.no-threads')
            </div>
        </div>
    </div>
</div>


@include('auth.foot')
