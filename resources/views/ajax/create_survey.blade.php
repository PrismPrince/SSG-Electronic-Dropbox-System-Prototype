{!! Form::open([
    'class' => 'form-survey',
    'role' => 'form',
    'files' => true,
    'url' => 'surveys',
]) !!}
    <div class="panel-body">
        <div class="img col-xs-1">
            @if (Storage::exists('public/images/avatar/' . Auth::user()->id . '.jpg'))
                <img src="{{ url('images/avatar/' . Auth::user()->id) }}" alt="">
            @else
                <img src="{{ url('images/avatar/default') }}" alt="">
            @endif
        </div>
        <div class="cont col-xs-11">
            {!! Form::text('title', isset($title) ? $title : '', [
                'class' => 't data-survey-title',
                'maxlength' => 255,
                'placeholder' => 'What\'s on your mind?',
            ]) !!}
            {!! Form::text('start', isset($start) ? $start : '', [
                'class' => 's data-survey-start col-sm-6 col-xs-12',
                'placeholder' => 'Start time',
            ]) !!}
            {!! Form::text('end', isset($end) ? $end : '', [
                'class' => 'e data-survey-end col-sm-6 col-xs-12',
                'placeholder' => 'End time',
            ]) !!}
            <select name="type" onchange="$(this).css('color', '#000')" class="opt data-survey-option">
                <option class="ph" value="" hidden>Choose how the students vote...</option>
                <option value="radio" {{ isset($type) ? 'selected' : '' }}>Vote only one option</option>
                <option value="checkbox" {{ isset($type) ? 'selected' : '' }}>Vote more than one option</option>
            </select>
            {!! Form::textarea('desc', isset($desc) ? $desc : '', [
                'class' => 'd data-survey-desc',
                'rows' => 3,
                'placeholder' => 'Tell more about it...',
            ]) !!}
            <div id="_answers">
                <div class="ans-group">
                    {!! Form::text('answers[]', old('answers[]'), [
                        'class' => 'ans data-survey-answer',
                        'required',
                        'maxlength' => 25,
                        'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,25}$',
                        'placeholder' => 'Answer...',
                    ]) !!}
                </div>
                <div class="ans-group">
                    {!! Form::text('answers[]', old('answers[]'), [
                        'class' => 'ans data-survey-answer',
                        'required',
                        'maxlength' => 25,
                        'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,25}$',
                        'placeholder' => 'Answer...',
                    ]) !!}
                </div>
            </div>
            {!! Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add answer', ['type' => 'button', 'class' => 'add-answer', 'id' => 'add-answer']) !!}
            <div class="i-img">
                {!! Form::file('image', [
                    'class' => 'img-up data-survey-image',
                    'accept' => 'image/*',
                ]) !!}
                <h4 class="img-drop text-center">Drop Photo</h4>
                {!! Form::button('&times;', ['class' => 'img-dismiss text-center']) !!}
            </div>
        </div>
    </div>
    <div class="panel-footer clearfix">
        {!! Form::button('Post', ['type' => 'submit', 'class' => 'btn btn-primary pull-right submit-idea', 'disabled']) !!}
    </div>
{!! Form::close() !!}

@include('partials._scripts._create_idea')