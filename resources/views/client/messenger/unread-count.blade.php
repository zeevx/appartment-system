<?php $count = Auth::user()->newThreadsCount(); ?>
@if($count > 0)
    <span class="label label-danger">{{ $count }}</span>
    @else
    <span class="label label-danger">0</span>
@endif
