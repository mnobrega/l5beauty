@extends('admin.layout')

@section('styles')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Trello Boards <small>&raquo; Listing</small></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="trello-boards-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Organization</th>
                        <th>Members</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($trelloBoards as $trelloBoard)
                            <tr>
                                <td data-order="{{$trelloBoard['name']}}">
                                    <a href="/admin/trello/board/{{$trelloBoard['id']}}">
                                        {{$trelloBoard['name']}}
                                    </a>
                                </td>
                                <td>{{$trelloBoard['desc']}}</td>
                                <td>{{$trelloBoard['idOrganization']}}</td>
                                <td>{{count($trelloBoard['memberships'])}}</td>
                                <td>
                                    <a href="{{$trelloBoard['url']}}" target="_blank">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#trello-boards-table").DataTable({
                order: [[0,"desc"]]
            });
        });
    </script>
@stop

