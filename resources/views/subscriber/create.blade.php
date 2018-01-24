@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">

            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route("subscriber.index", ['id' => $id]) }} ">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>

            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>New subscriber</b></div>
        </div>
    </div>


    <div class="panel-body">
        {!! Form::open(['url'=> "bunch/$id/subscriber/store"]) !!}

        @include('subscriber._form')

         {!!Form::text ('bunch_id', $id, ['class' => 'hidden']) !!}

        <div class="form-group">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    @if(session('message'))
        <div class="alert alert-danger"> {{session('message')}}</div>
    @endif

    @include('layouts.errors')

        {{--@if ($errors->any())--}}
            {{--<div class="alert alert-danger">--}}
                {{--<ul>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}

@endsection