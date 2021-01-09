@include('auth.head')
@include('spm.menu')
@include('auth.alert')



<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Messages</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('spm.messages.create') }}" class="btn btn-primary">Create New Message</a>
                <br>
                @include('spm.messenger.partials.flash')

                @each('spm.messenger.partials.thread', $threads, 'thread', 'spm.messenger.partials.no-threads')
            </div>
        </div>
    </div>
</div>


@include('auth.foot')
