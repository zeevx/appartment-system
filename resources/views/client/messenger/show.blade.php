@include('auth.head')
@include('client.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ $thread->subject }}</h4>
            </div>
            <div class="card-body">
                <br>
                @each('client.messenger.partials.messages', $thread->messages, 'message')

                @include('client.messenger.partials.form-message')
            </div>
        </div>
    </div>
</div>
@include('auth.foot')
