@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">

            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('campaign.index') }} ">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>

            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>New Campaign</b></div>
        </div>
    </div>
        <div class="panel-body">
            {!! Form::open(['route' => 'campaign.store']) !!}


            @include('campaign._form')

            {{--<div class="form-group">--}}
                {{--{!!Form::label('name', 'Name') !!}--}}
                {{--{!!Form::text('name', null, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('template_id', 'Template') !!}--}}
                {{--{!! Form::select(--}}
                {{--'template',--}}
                {{--\App\Template::getSelectList(),--}}
                {{--isset($campaign) ? $campaign->template_name : null,--}}
                {{--['class' => 'form-control']--}}
                {{--) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('bunch_id', 'Bunch') !!}--}}
                {{--{!! Form::select(--}}
                {{--'bunch',--}}
                {{--\App\Bunch::getSelectList(),--}}
                {{--isset($campaign) ? $campaign->bunch_name : null,--}}
                {{--['class' => 'form-control']--}}
                {{--) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!!Form::label('description', 'Description') !!}--}}
                {{--{!!Form::textarea('description', null, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}


            {{--{{dump()}}--}}

            <div class="form-group">
                {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
        <div class="form-group">



        </div>

        @include('layouts.errors')


@endsection
