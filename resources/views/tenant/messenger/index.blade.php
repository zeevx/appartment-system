@include('auth.head')
@include('tenant.menu')
@include('auth.alert')



<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Messages</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('tenant.messages.create') }}" class="btn btn-primary">Create New Message</a>
                <br>
                @include('tenant.messenger.partials.flash')

                @each('tenant.messenger.partials.thread', $threads, 'thread', 'tenant.messenger.partials.no-threads')
            </div>
        </div>
    </div>
</div>


@include('auth.foot')
