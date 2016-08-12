<p class="col-xs-12">{{ $activity->desc }}</p>
<div class="a-i">
    @if ($activity->options)
        @if (Storage::exists('public/images/surveys/' . $activity->id . '.jpg'))
            <img src="{{ url('images/surveys/' . $activity->id) }}">
        @endif
    @else
        @if (Storage::exists('public/images/posts/' . $activity->id . '.jpg'))
            <img src="{{ url('images/posts/' . $activity->id) }}">
        @endif
    @endif
</div>
<div class="col-xs-12 a-f">
    @if ($activity->options)
        <hr>
        <span class="a-tt" title="{{ count($activity->options) . ' ' . str_plural('option', count($activity->options)) }}">
            <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> {{ count($activity->options) }}
        </span>
        <span class="label label-{{ $activity->status == 'active' ? 'success' : ($activity->status == 'pending' ? 'default' : 'danger') }}">{{ ucfirst($activity->status) }}</span>
        <span class="a-f-{{ $activity->status == 'active' ? 'a' : ($activity->status == 'pending' ? 'p' : 'e') }} a-tt">{{ $activity->status == 'pending' ? $activity->start : ($activity->status == 'pending' ? $activity->end : $activity->end) }}</span>
    @endif
</div>