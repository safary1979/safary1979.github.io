<div class="form-group">
    {!!Form::label('name', 'Name') !!}
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('template', 'Template') !!}
    {!! Form::select(
    'template_id',
    \App\Template::getSelectList(),
    isset($campaign) ? $campaign->template_name : null,
    ['class' => 'form-control']
    ) !!}
</div>

<div class="form-group">
    {!! Form::label('bunch', 'Bunch') !!}
    {!! Form::select(
    'bunch_id',
    \App\Bunch::getSelectList( ),
    isset($campaign) ? $campaign->bunch_name : null,
    ['class' => 'form-control']
    ) !!}
</div>


{{--<div class="form-group">--}}
    {{--{!! Form::select(--}}
    {{--'bunch_id',--}}
    {{--\App\Bunch::getSelectId(),--}}
     {{--isset($campaign) ? $campaign->bunch_name : null,--}}
    {{--['class' => 'hidden']--}}
    {{--) !!}--}}
{{--</div>--}}

{{--{{dump($campaign->template)}}--}}
{{--{{dump($qqq['7'])}}--}}

{{--<div class="form-group">--}}
    {{--{!! Form::select(--}}
    {{--'template_id',--}}
    {{--\App\Template::getSelectId(),--}}
     {{--isset($campaign) ? $campaign->bunch_name : null,--}}
    {{--['class' => 'hidden']--}}
    {{--) !!}--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--{!! Form::text('recipients',--}}
    {{--\App\Subscriber::getSelectId()->count(),--}}
    {{--['class' => 'hidden']--}}
    {{--) !!}--}}
{{--</div>--}}

{{--{{dump( \App\Bunch::getSelectList())}}--}}

<div class="form-group">
    {!!Form::label('description', 'Description') !!}
    {!!Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>


{{--<input type="text" id="find" name="plz" onchange="a_value(this);"/>--}}

{{--<div class="form-group">--}}
    {{--<input id="test" name="bunch" class="hidden"></input>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--<input id="test1" name="template_id" class="hidden"></input>--}}
{{--</div>--}}


