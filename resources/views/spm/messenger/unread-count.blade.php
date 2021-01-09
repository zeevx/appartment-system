<?php $count = Auth::user()->newThreadsCount(); ?>
{{ ($count > 0)?$count:'0' }}
