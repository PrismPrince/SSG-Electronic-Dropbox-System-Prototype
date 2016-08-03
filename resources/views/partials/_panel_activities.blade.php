@foreach ($activities as $activity)
    <div class="panel panel-info">
        <div class="panel-body clearfix">
            <div class="col-xs-11">
                <img src="{{ url('img/pic.jpg') }}">
                <h5 class="a-h">
                    <b class="a-h-n">{{ Html::link('profile/' . $activity->user_id . '/timeline', $activity->user->fname . ' ' . $activity->user->lname) }}</b>
                    @if ($activity->options)
                        conducted a survey about
                    @else
                        posted
                    @endif
                    @if ($activity->options)
                        {{ Html::link('surveys/' . $activity->user_id, $activity->title) }}
                    @else
                        {{ Html::link('posts/' . $activity->user_id, $activity->title) }}
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
                        <a href="{{ url(($activity->options ? 'surveys/' : 'posts/') . $activity->id . '/edit') }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    '><span class="caret"></span></a>
                @endif
            </div>
            <p class="col-xs-12">{{ str_limit($activity->desc, 500) }}</p>
            @if ($activity->options)
                @if (Storage::exists('public/surveys/' . $activity->id . '.x'))
                    <img src="{{ Storage::get('public/surveys/' . $activity->id . '.x') }}">
                @endif
            @else
                @if (Storage::exists('public/posts/' . $activity->id . '.x'))
                    <img src="{{ Storage::get('public/posts/' . $activity->id . '.x') }}">
                @endif
            @endif
            <hr>
            <div class="col-xs-12 a-f">
                @if ($activity->options)
                    <a href="{{ url('surveys/' . $activity->id) }}" class="btn btn-info btn-xs">Read More</a>
                    <span class="a-tt" title="{{ count($activity->options) . ' ' . str_plural('option', count($activity->options)) }}">
                        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> {{ count($activity->options) }}
                    </span>
                    <span class="label label-{{ $activity->status == 'active' ? 'success' : ($activity->status == 'pending' ? 'default' : 'danger') }}">{{ ucfirst($activity->status) }}</span>
                    <span class="a-f-{{ $activity->status == 'active' ? 'a' : ($activity->status == 'pending' ? 'p' : 'e') }} a-tt">{{ $activity->status == 'pending' ? $activity->start : ($activity->status == 'pending' ? $activity->end : $activity->end) }}</span>
                @else
                    <a href="{{ url('posts/' . $activity->id) }}" class="btn btn-info btn-xs">Read More</a>
                @endif
            </div>
        </div>
    </div>
@endforeach