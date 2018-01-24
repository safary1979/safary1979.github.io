@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    {{--<div class="panel-heading centered-child"><b>{{$templates->name}}</b></div>--}}
                    <div class="panel-heading centered-child"><b>Campaigns</b></div>
                    <div class="panel-body">

                        <table class="table table-bordered table-responsive table-striped">
                            <tr >

                                <th width="15%">Name</th>
                                <th width="20%">Desription</th>
                                <th width="15%">Template</th>
                                <th width="15%">Bunch</th>
                                <th width="5%">Recipients</th>
                                <th width="30%">Action</th>
                            </tr>
                            <tr>
                                <td colspan="6" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                            <a class="table-cell fa-green padding-sm" href="{{ route('campaign.create') }} ">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{--<span class="hidden">{{$temp = 0}}</span>--}}
                            @foreach ($campaigns as $campaign)
                                <tr class="clickable_row" onclick="window.location = 'campaign/{{$campaign->id}}'">

                                    <td>{{$campaign->name}}</td>
                                    <td>{{$campaign->description}}</td>
                                    <td>{{ \App\Template::find($campaign->template_id)->name}}</td>
                                    <td>{{ \App\Bunch::find($campaign->bunch_id)->name }}</td>
{{--                                    <td>{{$campaign->recipients}}</td>--}}
                                    <td>{{\App\Subscriber::where('bunch_id',$campaign->bunch_id)->count()}}</td>
                                    <td>
                                        {{Form::open(['class'  =>  'confirm-delete',  'route'  =>  ['campaign.destroy',  $campaign->id],'method' => 'DELETE'])}}

                                        <a href="{{ URL::to('campaign/' .$campaign->id . '/preview/') }}" class="btn btn-warning btn-xs" >preview</a> |

                                        {{ link_to_route('campaign.show', 'info', [$campaign->id], ['class' => 'btn btn-info btn-xs']) }} |
                                        {{ link_to_route('campaign.edit', 'edit', [$campaign->id], ['class' => 'btn btn-primary btn-xs']) }} |
                                        {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                        {{Form::close()}}
                                    </td>
                                </tr>
                                {{--<span class="hidden">{{$temp+=1}}</span>--}}
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 
