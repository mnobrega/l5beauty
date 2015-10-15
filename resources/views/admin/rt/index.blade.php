@extends('admin.layout')

@section('styles')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>RT Cards <small>&raquo; Listing</small></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="rt-cards-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($RTCards as $RTCardId=>$RTCardDescription)
                        <tr>
                            <td>{{$RTCardId}}</td>
                            <td data-order="{{$RTCardDescription}}">{{$RTCardDescription}}</td>
                            <td>
                                <a href="" target="_blank">
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
            $("#rt-cards-table").DataTable({
                order: [[0,"desc"]]
            });
        });
    </script>
@stop
