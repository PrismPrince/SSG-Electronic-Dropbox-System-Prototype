<script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-up').css('display', 'none');
                $('.img-dismiss').css('display', 'block');
                $('.i-img').css('height', '250px')
                    .css('width', '100%')
                    .css('background',  'url(\'' + e.target.result + '\') no-repeat')
                    .css('background-size', '100%')
                    .css('background-position', '0 0');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.img-up').hover(function(){
        $(this).tooltip({
            'title': 'Upload a photo/Drag and Drop',
            'placement': 'right',
        });
    });

    $('.img-up').change(function(){
        if (!this.files[0].type.match('image.*')) {
            alert('Input is not an image!');
            $('.img-dismiss').css('display', 'none');
            $(this).css('display', 'block').val('');
            $('.i-img')
                .css('width', '50px')
                .css('height', '50px')
                .css('background',  'url(\'{{ url('img/plus.png') }}\') no-repeat')
                .css('background-size', '25px')
                .css('background-position', '50%');
            $('.img-drop').css('display', 'none');
            return false;
        }
        readURL(this);
    }).on('dragenter', function() {
        $('.i-img')
            .css('width', '100%')
            .css('height', '250px')
            .css('background', 'none');
        $('.img-drop').css('display', 'block');
    }).on('dragover', function() {
        $('.img-drop').css('display', 'block');
    }).on('drop', function() {
        $('.img-drop').css('display', 'none');
    }).on('dragleave', function() {
        $('.i-img')
            .css('width', '50px')
            .css('height', '50px')
            .css('background',  'url(\'{{ url('img/plus.png') }}\') no-repeat')
            .css('background-size', '25px')
            .css('background-position', '50%');
        $('.img-drop').css('display', 'none');
    });

    $('.img-dismiss').click(function(){
        $('.img-dismiss').css('display', 'none');
        $('.img-up').css('display', 'block').val('');
        $('.i-img').css('height', '50px')
            .css('width', '50px')
            .css('background',  'url(\'{{ url('img/plus.png') }}\') no-repeat')
            .css('background-size', '25px')
            .css('background-position', '50%');
    });

    $('.data-survey-start').datetimepicker({
        minDate: 0,
        minTime: 0,
        defaultDate: 0,
        format: 'M d, Y g:i a'
    });

    $('.data-survey-end').datetimepicker({
        minDate: 0,
        minTime: 0,
        defaultDate: 0,
        format: 'M d, Y g:i a'
    });

    $('#add-answer').on('click', function(){
        $('#_answers').append('<div class="ans-group">' +
            '{!! Form::button('&times;', ['class' => 'ans-dismiss text-center', 'onclick' => '$(this).parent().remove();']) !!}' +
            '{!! Form::text('answers[]', old('answers[]'), [
                'class' => 'ans data-survey-answer',
                'required',
                'maxlength' => 25,
                'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,25}$',
                'placeholder' => 'Answer...',
            ]) !!}' +
        '</div>');
    });

    var title = $('form input[name="title"]');
    var desc = $('form textarea[name="desc"]');
    var start = $('form input[name="start"]');
    var end = $('form input[name="end"]');
    var option = $('form select[name="type"]');
    var answers = $('form input[name*="answers"][required]');
    var submit = $('form button[type="submit"]');

    var titleStat,
        descStat,
        startStat,
        endStat,
        optionStat,
        answersStat;

    function tt(o, m) {
        return o.attr('data-original-title', m).tooltip({placement: 'bottom'}).tooltip('show');
    }

    function valSurvey() {
        if(
            true == titleStat &&
            true == descStat &&
            true == startStat &&
            true == endStat &&
            true == optionStat &&
            true == answersStat
        ) return true;
        else return false;
    }

    function valPost() {
        if(
            true == titleStat &&
            true == descStat
        ) return true;
        else return false;
    }

    title.focusout(function(e) {
        if(title.val().trim().length === 0) {
            titleStat = false;
            tt(title, 'Please enter the title!');
        } else if (!/^[\.\,\?\!\:\'\"\;\-\_\(\)\&\/\\\%\*\d\sa-z]{1,255}$/i.test(title.val())) {
            titleStat = false;
            tt(title, 'Some characters are not accepted!');
        } else {
            titleStat = true;
            tt(title, '');
        }
    });

    desc.focusout(function(e) {
        if(desc.val().trim().length === 0) {
            descStat = false;
            tt(desc, 'Please enter the description!');
        } else {
            descStat = true;
            tt(desc, '');
        }
    });

    start.focusout(function(e) {
        if(start.val().trim().length === 0) {
            startStat = false;
            tt(start, 'Please enter a valid time!');
        } else if (new Date(start.datetimepicker('getValue')) <= new Date()) {
            startStat = false;
            tt(start, 'Please enter time after now!');
        } else {
            startStat = true;
            tt(start, '');
        }
    });

    end.focusout(function(e) {
        if(end.val().trim().length === 0) {
            endStat = false;
            tt(end, 'Please enter a valid time!');
        } else if (new Date(end.datetimepicker('getValue')) <= new Date(start.datetimepicker('getValue'))) {
            endStat = false;
            tt(end, 'Please enter time after the start time!');
        } else if (!startStat) {
            endStat = false;
            tt(end, 'Please enter start time properly!');
        } else {
            endStat = true;
            tt(end, '');
        }
    });

    option.focusout(function(e) {
        if(option.val().trim().length === 0) {
            optionStat = false;
            tt(option, 'Please select an option!');
        } else if (option.val() == 'radio' || option.val() == 'checkbox') {
            optionStat = true;
            tt(option, '');
        } else {
            optionStat = false;
            tt(option, 'Invalid option Value!');
        }
    });

    answers.focusout(function(e) {
        answers.each(function() {
            if($(this).val().trim().length === 0) {
                answersStat = false;
                tt($(this), 'Please enter atleast two answers!');
            } else if($(this).val().trim().length > 25) {
                answersStat = false;
                tt($(this), 'Input must be less than or equal to 25 characters!');
            } else if(!/^[\.\,\?\!\:\'\"\;\-\_\(\)\&\/\\\%\*\d\sa-z]{1,255}$/i.test($(this).val())) {
                answersStat = false;
                tt($(this), 'Some characters are not accepted!');
            }
            else {
                answersStat = true;
                tt($(this), '');
            }
        });
    });

    submit.click(function() {
        $(this).submit();
    })

    $('.form-survey input, .form-survey textarea, .form-survey select').focusout(function(e){
        if (valSurvey()) {
            submit.removeAttr('disabled');
        }
    });

    $('.form-post input, .form-post textarea').focusout(function(e){
        if (valPost()) {
            submit.removeAttr('disabled');
        }
    });
</script>