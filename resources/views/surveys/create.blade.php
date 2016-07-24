@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">

                {!! Form::open([
                    'class' => 'form-horizontal',
                    'data-toggle' => 'validator',
                    'role' => 'form',
                    'url' => 'surveys',
                ]) !!}

@if($errors->has('sh')||$errors->has('smin')||$errors->has('sap'))
@foreach($errors as $error)
{{ var_dump($error) }}
@endforeach
@endif
                    <div class="form-group has-feedback col-md-12{{ $errors->has('title') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                        {!! Form::text('title', isset($title) ? $title : '', [
                            'class' => 'form-control',
                            'required',
                            'maxlength' => 255,
                            'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                            'data-error' => 'Please enter a valid input!',
                            'placeholder' => 'Enter post title...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('title') ? $errors->first('title') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('start') || $errors->has('sm') || $errors->has('sd') || $errors->has('sy') || $errors->has('sh') || $errors->has('smin') || $errors->has('sap') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('start', 'Starts on (time is optional)', ['class' => 'control-label']) !!}
                        <div class="row">
                            <div class="col-lg-2">
                                {!! Form::label('sm', 'Month', ['class' => 'control-label']) !!}
                                {!! Form::text('sm', isset($sm) ? $sm : '', [
                                    'class' => 'form-control',
                                    'required',
                                    'max' => 2,
                                    'pattern' => '^[0-9]|0[1-9]|1[012]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'mm',
                                ]) !!}
                                {!! $errors->has('sm') ? '<div class="help-block">' . $errors->first('sm')  . '</div>': '' !!}
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('sd', 'Day', ['class' => 'control-label']) !!}
                                {!! Form::text('sd', isset($sd) ? $sd : '', [
                                    'class' => 'form-control',
                                    'required',
                                    'max' => 2,
                                    'pattern' => '^[0-9]|0[0-9]|1[0-9]|2[0-9]|3[0-1]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'dd',
                                ]) !!}
                                {!! $errors->has('sd') ? '<div class="help-block">' . $errors->first('sd')  . '</div>': '' !!}
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('sy', 'Year', ['class' => 'control-label']) !!}
                                {!! Form::text('sy', isset($sy) ? $sy : '', [
                                    'class' => 'form-control',
                                    'required',
                                    'max' => 2,
                                    'pattern' => '^[1-2][09][019][0-9]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'yyyy',
                                ]) !!}
                                {!! $errors->has('sy') ? '<div class="help-block">' . $errors->first('sy')  . '</div>': '' !!}
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('sh', 'Hour', ['class' => 'control-label']) !!}
                                {!! Form::text('sh', isset($sh) ? $sh : '', [
                                    'class' => 'form-control',
                                    'max' => 2,
                                    'pattern' => '^[0-9]|0[0-9]|1[012]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'hh',
                                ]) !!}
                                {!! $errors->has('sh') ? '<div class="help-block">' . $errors->first('sh')  . '</div>': '' !!}
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('smin', 'Minute', ['class' => 'control-label']) !!}
                                {!! Form::text('smin', isset($smin) ? $smin : '', [
                                    'class' => 'form-control',
                                    'max' => 2,
                                    'pattern' => '^[0-9]|[0-5][0-9]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'mm',
                                ]) !!}
                                {!! $errors->has('smin') ? '<div class="help-block">' . $errors->first('smin' . '</div>') : '' !!}
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('sap', 'AM/PM', ['class' => 'control-label']) !!}
                                {!! Form::text('sap', isset($sap) ? $sap : '', [
                                    'class' => 'form-control',
                                    'max' => 2,
                                    'pattern' => '^[AaPp][Mm]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'am/pm',
                                ]) !!}
                                {!! $errors->has('sap') ? '<div class="help-block">' . $errors->first('sap') . '</div>' : '' !!}
                            </div>
                        </div>
                        <div class="help-block with-errors">{{ $errors->has('start') ? $errors->first('start') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('end') || $errors->has('em') || $errors->has('ed') || $errors->has('ey') || $errors->has('eh') || $errors->has('emin') || $errors->has('eap') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('end', 'Ends on (time is optional)', ['class' => 'control-label']) !!}
                        <div class="row">
                            <div class="col-lg-2">
                                {!! Form::label('em', 'Month', ['class' => 'control-label']) !!}
                                {!! Form::text('em', isset($em) ? $em : '', [
                                    'class' => 'form-control',
                                    'required',
                                    'max' => 2,
                                    'pattern' => '^[0-9]|0[1-9]|1[012]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'mm',
                                ]) !!}
                                {!! $errors->has('em') ? '<div class="help-block">' . $errors->first('em')  . '</div>': '' !!}
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('ed', 'Day', ['class' => 'control-label']) !!}
                                {!! Form::text('ed', isset($ed) ? $ed : '', [
                                    'class' => 'form-control',
                                    'required',
                                    'max' => 2,
                                    'pattern' => '^[0-9]|0[0-9]|1[0-9]|2[0-9]|3[0-1]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'dd',
                                ]) !!}
                                {!! $errors->has('ed') ? '<div class="help-block">' . $errors->first('ed')  . '</div>': '' !!}
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('ey', 'Year', ['class' => 'control-label']) !!}
                                {!! Form::text('ey', isset($ey) ? $ey : '', [
                                    'class' => 'form-control',
                                    'required',
                                    'max' => 2,
                                    'pattern' => '^[1-2][09][019][0-9]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'yyyy',
                                ]) !!}
                                {!! $errors->has('ey') ? '<div class="help-block">' . $errors->first('ey')  . '</div>': '' !!}
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('eh', 'Hour', ['class' => 'control-label']) !!}
                                {!! Form::text('eh', isset($eh) ? $eh : '', [
                                    'class' => 'form-control',
                                    'max' => 2,
                                    'pattern' => '^[0-9]|0[0-9]|1[012]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'hh',
                                ]) !!}
                                {!! $errors->has('eh') ? '<div class="help-block">' . $errors->first('eh')  . '</div>': '' !!}
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('emin', 'Minute', ['class' => 'control-label']) !!}
                                {!! Form::text('emin', isset($emin) ? $emin : '', [
                                    'class' => 'form-control',
                                    'max' => 2,
                                    'pattern' => '^[0-9]|[0-5][0-9]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'mm',
                                ]) !!}
                                {!! $errors->has('emin') ? '<div class="help-block">' . $errors->first('emin' . '</div>') : '' !!}
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('eap', 'AM/PM', ['class' => 'control-label']) !!}
                                {!! Form::text('eap', isset($eap) ? $eap : '', [
                                    'class' => 'form-control',
                                    'max' => 2,
                                    'pattern' => '^[AaPp][Mm]$',
                                    'data-error' => 'Please enter a valid date!',
                                    'placeholder' => 'am/pm',
                                ]) !!}
                                {!! $errors->has('eap') ? '<div class="help-block">' . $errors->first('eap') . '</div>' : '' !!}
                            </div>
                        </div>
                        <div class="help-block with-errors">{{ $errors->has('end') ? $errors->first('end') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('type') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
                        <select name="type" class="form-control" data-error="Please select one option!" required>
                            <option value="" >Choose how the students vote...</option>
                            <option value="radio" {{ isset($type) ? 'selected' : '' }}>Vote only one option</option>
                            <option value="checkbox" {{ isset($type) ? 'selected' : '' }}>Vote more than one option</option>
                        </select>
                        <div class="help-block with-errors">{{ $errors->has('type') ? $errors->first('type') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('desc') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('desc', 'Description', ['class' => 'control-label']) !!}
                        {!! Form::textarea('desc', isset($desc) ? $desc : '', [
                            'class' => 'form-control',
                            'required',
                            'rows' => 3,
                            'data-error' => 'Please enter a valid input!',
                            'placeholder' => 'Enter post description...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('desc') ? $errors->first('desc') : '' }}</div>
                    </div>

                    @if(Session::has('error_ans'))
                        <div class="row col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Error:</strong> {!! Session::get('error_ans') !!}
                            </div>
                        </div>
                    @endif

                    <div id="_answers">
                        <div class="form-group col-md-4">
                            {!! Form::label('answers[]', 'Answers (at least 2 answers)', ['class' => 'control-label']) !!}
                            {!! Form::text('answers[]', old('answers[]'), [
                                'class' => 'form-control',
                                'id' => 'answers',
                                'required',
                                'maxlength' => 255,
                                'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                                'data-error' => 'Please enter a valid input!',
                                'placeholder' => 'Answer...',
                            ]) !!}
                        </div>

                        <div class="form-group col-md-4" style="margin-top:27px;margin-left:15px">
                            {!! Form::text('answers[]', old('answers[]'), [
                                'class' => 'form-control',
                                'id' => 'answers',
                                'required',
                                'maxlength' => 255,
                                'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                                'data-error' => 'Please enter a valid input!',
                                'placeholder' => 'Answer...',
                            ]) !!}
                        </div>

                        <div class="form-group col-md-4" style="margin-top:27px;margin-left:15px">
                            {!! Form::text('answers[]', old('answers[]'), [
                                'class' => 'form-control',
                                'id' => 'answers',
                                'maxlength' => 255,
                                'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                                'data-error' => 'Please enter a valid input!',
                                'placeholder' => 'Answer...',
                            ]) !!}
                        </div>
                    </div>


                    <div class="form-group col-md-12">
                        {!! Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['type' => 'button', 'class' => 'btn btn-success', 'id' => 'add-answer']) !!}
                        {!! Form::button('Post', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                        {!! Html::linkRoute('surveys.index', 'Cancel', null, ['class' => 'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#add-answer').on('click', function(){
                $('#_answers').append('<div class="form-group col-md-4" style="margin-right:15px">{{ Form::text('answers[]', old('answers[]'), [
                    'class' => 'form-control',
                    'id' => 'answers',
                    'maxlength' => 255,
                    'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                    'data-error' => 'Please enter a valid input!',
                    'placeholder' => 'Answer...',
                ]) }}</div>');
            });
        });
    </script>
@endsection