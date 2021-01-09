<?php $class = $thread->isUnread(Auth::id()) ? 'alert-danger' : ''; ?>

<div class="container-fluid {{ $class }} pt-2" style="color: black">
    <h5>
        <a href="{{ route('spm.messages.show', $thread->id) }}">
            {{ $thread->subject }}
        </a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
    </h5>
    <h5>
        Last Message: {{ $thread->latestMessage->body ?? '' }}
    </h5>
    <p>
        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </p>
    <hr>
</div>
