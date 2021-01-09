@include('auth.head')
@include('tenant.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ $thread->subject }}</h4>
            </div>
            <div class="card-body">
                <br>
                @each('tenant.messenger.partials.messages', $thread->messages, 'message')

                @include('tenant.messenger.partials.form-message')
            </div>
        </div>
    </div>
</div>
@include('auth.foot')
