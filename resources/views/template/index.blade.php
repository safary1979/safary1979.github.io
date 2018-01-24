@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    {{--<div class="panel-heading centered-child"><b>{{$templates->name}}</b></div>--}}
                    <div class="panel-heading centered-child"><b>Templates</b></div>
                    <div class="panel-body">

                        <table class="table table-bordered table-responsive table-striped">
                            <tr >

                                <th width="25%">Name</th>
                                <th width="55%">Content</th>
                                <th width="20%">Action</th>
                            </tr>
                            <tr>
                                <td colspan="5" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                            <a class="table-cell fa-green padding-sm" href="{{ route('template.create') }} ">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{--<span class="hidden">{{$temp = 0}}</span>--}}
                            @foreach ($templates as $template)
                                <tr class="clickable_row" onclick="window.location = 'template/{{$template->id}}'">

                                    <td>{{$template->name}}</td>
                                    <td>{{$template->content}}</td>
                                    <td>
                                        {{Form::open(['class'  =>  'confirm-delete',  'route'  =>  ['template.destroy',  $template->id],'method' => 'DELETE'])}}
                                        {{ link_to_route('template.show', 'info', [$template->id], ['class' => 'btn btn-info btn-xs']) }} |
                                        {{ link_to_route('template.edit', 'edit', [$template->id], ['class' => 'btn btn-primary btn-xs']) }} |
                                        {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                        {{Form::close()}}
                                    </td>
                                </tr>
                                {{--<span class="hidden">{{$temp+=1}}</span>--}}


                                {{--{!! Form::select('bunch_id',[$template->name],null   , ['class'=>'form-control input-sm']     ) !!}--}}
                                {{--{{ Form::select('number', [1, 2, 3], null, ['class' => 'field']) }}--}}

                            @endforeach
                        </table>


                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('template_id', 'Template') !!}--}}
                            {{--{!! Form::select(--}}
                               {{--'id',--}}
                               {{--\App\Template::getSelectList(),--}}
                               {{--isset($campaign) ? $campaign->template_id : null,--}}
                               {{--['class' => 'form-control']--}}
                            {{--) !!}--}}
                        {{--</div>--}}



                        {{--<div class="form-group">--}}
                            {{--{!!Form::label('name', 'Name') !!}--}}
                            {{--{!!Form::text('name', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}

                        {{--{!! Form::label('bunch_id','Bunch') !!}--}}
                        {{--{!! Form::select(--}}
                        {{--'bunch_id',--}}
                        {{--\App\Template::getSelectList(),--}}


                        {{--['class'=>'form-control']--}}
                        {{--) !!}--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 
