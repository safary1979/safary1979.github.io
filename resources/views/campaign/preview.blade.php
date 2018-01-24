@extends('layouts.panel')
<?php  /** @var \Illuminate\Support\ViewErrorBag $errors */  ?>
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('campaign.index')}}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">Campaign PREVIEW: <b>{{$campaigns->name}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => ['campaign.destroy', $campaigns->id], 'method' => 'DELETE'])}}
                    {{ link_to_route('campaign.edit', 'edit', [$campaigns->id], ['class' => 'btn btn-primary btn-xs']) }} |
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">

        <table class="table table-bordered table-responsive">
            <tr>
                <td>Subject</td>
                <td>{{$campaigns->name}}</td>
            </tr>
            <tr>
                <td>To</td>
                <td>
                    @foreach ($campaign as $var)
                        <b>{{$var ->email . ' ,'}}</b>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>From</td>
                <td>     somebody@gmail.com    </td>
            </tr>
            <tr>
                <td>Message</td>
                <td>
                    @if($message != null)
                    {{$message->content}}</td>
                @endif
            </tr>
        </table>
        {{--<form method="POST" action="http://quickmail.grassbusinesslabs.tk/campaign/29/send" accept-charset="UTF-8" class="confirm-send inline-form-buttons "><input name="_token" type="hidden" value="0P1QeMNiQ3zKevoaHFDtB8bkkaYc5jwgTlD8QgVf">--}}
            {{--<button class="btn btn-success btn-md" type="submit">SEND THIS CAMPAIGN</button>--}}

        {{--</form>--}}

    </div>
    {!! Form::open(['url'=>'send']) !!}


    {!!Form::text('name', $campaigns->name, ['class' => 'hidden']) !!}
    {!!Form::text('msg', $message->content, ['class' => 'hidden']) !!}
    {!!Form::text('id', $campaigns->id, ['class' => 'hidden']) !!}



        {{Form::button('SEND THIS CAMPAIGN', ['class' => 'btn btn-success btn-md', 'type' => 'submit'])}}
    {!! Form::Close() !!}




    @include('layouts.errors')

@endsection