@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading centered-child"><b>Bunches</b></div>
                    <div class="panel-body">

                        <table class="table table-bordered table-responsive table-striped">
                            <tr >

                                <th width="15%">Name</th>
                                <th width="40%">Description</th>
                                <th width="15%">Emails</th>
                                <th width="30%">Action</th>
                            </tr>
                            <tr>
                                <td colspan="5" class="light-green-background no-padding" title="Create new bunch">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                            <a class="table-cell fa-green padding-sm" href="{{ route('bunch.create') }} ">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>

                                            {{--{{ link_to_route('bunch.create', '<i class="fa fa-plus" aria-hidden="true"></i>', null,--}}
                                            {{--['class' => 'table-cell fa-green padding-sm'] ) }}--}}

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <span class="hidden">{{$temp = 0}}</span>
                            @foreach ($bunches as $bunch)
                                <tr class="clickable_row" onclick="window.location = 'bunch/{{$bunch->id}}/subscriber'">
                                <tr class="clickable_row"  onclick="window.location = 'http://project4/bunch/{{$bunch->id}}/subscriber'">

                                    <td>{{$bunch->name}}</td>
                                    <td>{{$bunch->description}}</td>
                                    <td>{{$bunch->subscribers->where('created_by',  Auth::user()->id)->count()}}</td>
                                    <td>
                                        {{Form::open(['class'  =>  'confirm-delete',  'route'  =>  ['bunch.destroy',  $bunch->id],'method' => 'DELETE'])}}
                                        {{ link_to_route('subscriber.index', 'subscribers', [$bunch->id], ['class' => 'btn btn-info btn-xs']) }} |
                                        {{ link_to_route('bunch.edit', 'edit', [$bunch->id], ['class' => 'btn btn-primary btn-xs']) }} |
                                        {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                        {{Form::close()}}
                                    </td>
                                </tr>
                                <span class="hidden">{{$temp+=1}}</span>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 
