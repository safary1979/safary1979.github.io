@extends('layouts.panel')

@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('bunch.index')}}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">Bunch:  <b>{{  $bunch->name}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => ['bunch.destroy', $id], 'method' => 'DELETE'])}}
                    {{ link_to_route('bunch.edit', 'edit', [$id], ['class' => 'btn btn-primary btn-xs']) }} |
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-responsive table-striped">
            <tr >
                <th width="25%">First Name</th>
                <th width="25%">Last Name</th>
                <th width="30%">Email</th>
                <th width="20%">Action</th>
            </tr>
            <tr>
                <td colspan="5" class="light-green-background no-padding" title="Create new subscriber">
                    <div class="row centered-child">
                        <div class="col-md-12">

                            <a class="table-cell fa-green padding-sm" href="{{ route('subscriber.create', ['id' => $id]) }}">
                                {{--<a class="table-cell fa-green padding-sm" href="{{url("bunch/$bunch->id/subscriber/create")}}">--}}

                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>

                        </div>
                    </div>
                </td>
            </tr>

            @foreach ($subscribers as $sub)
                <tr >
                    <td>{{$sub->f_name}}</td>
                    <td>{{$sub->l_name}}</td>
                    <td>{{$sub->email}}</td>
                    <td>
                        {{Form::open(['class'  =>  'confirm-delete',  'route'  =>  ['subscriber.destroy',  $id, $sub->id ],'method' => 'DELETE'])}}
                        {{--                            <a href="{{ URL::to('bunch/' .$id . '/subscriber/'.$bunch->id. '/edit') }}" class="btn btn-primary btn-xs" >edit</a>--}}
                        {{--                            <a href="{{ route('subscriber/'.$bunch->id. '/edit', ['id' => $bunch->id]) }}" class="btn btn-primary btn-xs" >edit</a>--}}

                        {{ link_to_route('subscriber.edit', 'edit', [$id,$sub->id], ['class' => 'btn btn-primary btn-xs']) }} |

                        {{--                            <a href="{{ route('subscriber/'.$bunch->id. '/edit', ['id' => $bunch->id]) }}" class="btn btn-primary btn-xs" >edit</a>--}}
                        {{--                            <a href="{{ route('subscriber.edit', ['id' => $id,'subscriber' => $bunch->id]) }}" class="btn btn-primary btn-xs" >edit</a>--}}


                        {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                        {{Form::close()}}
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
    @if(session('message'))
        <div class="alert alert-danger"> {{session('message')}}</div>
    @endif
@endsection
