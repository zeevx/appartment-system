<div class="media">
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->name }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>- {{ $message->created_at->diffForHumans() }}</small>
        </div>
        <hr>
    </div>
</div>
