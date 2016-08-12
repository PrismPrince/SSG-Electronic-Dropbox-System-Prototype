<div class="h-i col-xs-11">
    @if (Storage::exists('public/images/avatar/' . $activity->user->id . '.jpg'))
        <img src="{{ url('images/avatar/' . $activity->user->id) }}" alt="">
    @else
        <img src="{{ url('images/avatar/default') }}" alt="">
    @endif
    <h5 class="a-h">
        <b class="a-h-n">{{ Html::link('profile/' . $activity->user_id . '/timeline', $activity->user->fname . ' ' . $activity->user->lname) }}</b>
        @if ($activity->options)
            conducted a survey about
        @else
            posted
        @endif
        @if ($activity->options)
            {{ Html::link('surveys/' . $activity->id, $activity->title) }}
        @else
            {{ Html::link('posts/' . $activity->id, $activity->title) }}
        @endif
        <br><small class="a-h-d a-tt">{{ $activity->created_at }}</small>
    </h5>
</div>