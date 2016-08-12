@foreach ($activities as $activity)
    <div class="panel panel-info">
        <div class="panel-body clearfix">
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
            <div class="col-xs-1 text-right">
                @if(Auth::guest())
                    {{ '' }}
                @elseif($activity->user->id == Auth::user()->id)
                    <a class="a-o" data-placement="bottom" data-content='
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => [$activity->options ? 'surveys.destroy' : 'posts.destroy', $activity->id],
                            'class' => 'form-horizontal'
                        ]) !!}
                        <a href="{{ url(($activity->options ? 'surveys/' : 'posts/') . $activity->id . '/edit') }}" class="act-edit btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'act-delete btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    '><span class="caret"></span></a>
                @endif
            </div>
            <p class="col-xs-12">{{ str_limit($activity->desc, 500) }}</p>
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
            <hr>
            <div class="col-xs-12 a-f">
                @if ($activity->options)
                    <a href="{{ url('surveys/' . $activity->id) }}" class="btn btn-info btn-xs read-more" data-act-type="survey" data-act-id="{{ $activity->id }}">Read More</a>
                    <span class="a-tt" title="{{ count($activity->options) . ' ' . str_plural('option', count($activity->options)) }}">
                        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> {{ count($activity->options) }}
                    </span>
                    <span class="label label-{{ $activity->status == 'active' ? 'success' : ($activity->status == 'pending' ? 'default' : 'danger') }}">{{ ucfirst($activity->status) }}</span>
                    <span class="a-f-{{ $activity->status == 'active' ? 'a' : ($activity->status == 'pending' ? 'p' : 'e') }} a-tt">{{ $activity->status == 'pending' ? $activity->start : ($activity->status == 'pending' ? $activity->end : $activity->end) }}</span>
                @else
                    <a href="{{ url('posts/' . $activity->id) }}" class="btn btn-info btn-xs read-more" data-act-type="post" data-act-id="{{ $activity->id }}">Read More</a>
                @endif
            </div>
        </div>
    </div>
@endforeach

@include('partials._scripts._activity')