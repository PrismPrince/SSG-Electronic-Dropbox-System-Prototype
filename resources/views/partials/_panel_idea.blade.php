<div class="panel panel-info">
    <div class="panel-heading">
        <ul class="c-i nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#" data-href="{{ url('ajax/create/post') }}" aria-controls="home" role="tab" data-toggle="tab">Post Information</a></li>
            <li role="presentation"><a href="#" data-href="{{ url('ajax/create/survey') }}" aria-controls="profile" role="tab" data-toggle="tab">Conduct a Survey</a></li>
            <li role="presentation"><a href="#" data-href="{{ url('ajax/create/suggestion') }}" aria-controls="messages" role="tab" data-toggle="tab">Suggest</a></li>
        </ul>
    </div>
    <div class="create-idea text-center">
        <img src='{{ url('img/loading.png') }}' class='loader' alt='Loading' />
    </div>
</div>