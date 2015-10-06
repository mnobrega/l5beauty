@extends('admin.layout')

@section('styles')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Board Cards <small>&raquo; Listing</small></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="trello-cards-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Due Date</th>
                        <th>List</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($boardCards as $boardCard)
                            <tr>
                                <td>{{$boardCard['idShort']}}</td>
                                <td data-order="{{$boardCard['name']}}">
                                    <a href="{{$boardCard['url']}}" target="_blank">
                                        {{$boardCard['name']}}
                                    </a>
                                </td>
                                <td>{{$boardCard['due']}}</td>
                                <td>{{$boardLists[$boardCard['idList']]}}</td>
                                <td>
                                    <a href="/admin/trello/board/card/{{$boardCard['id']}}">
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
            $("#trello-cards-table").DataTable({
                order: [[0,"desc"]]
            });
        });
    </script>
@stop

