@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">

            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('bunch.index') }} ">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>

            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>New Bunch</b></div>
        </div>
    </div>

        <div class="panel-body">
            {!! Form::open(['route' => 'bunch.store']) !!}

            @include('bunch._form')

            {!!Form::text('created_by', $user_id, ['class' => 'hidden']) !!}
            {{--{{dump($user_id) }}--}}


            <div class="form-group">
                {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    @if(session('message'))
        <div class="alert alert-danger"> {{session('message')}}</div>
    @endif

    @include('layouts.errors')


@endsection