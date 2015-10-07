@extends('admin.layout')

@section('styles')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Mails <small>&raquo; Listing</small></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="mails-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Received</th>
                        <th>From</th>
                        <th>Subject</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($mails as $mail)
                            <tr>
                                <td>{{$mail->id}}</td>
                                <td data-order="{{$mail->date}}">{{$mail->date}}</td>
                                <td>{{$mail->fromName}}</td>
                                <td>{{$mail->subject}}</td>
                                <td>
                                    <a href="#" target="_blank">
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
            $("#mails-table").DataTable({
                order: [[0,"desc"]]
            });
        });
    </script>
@stop

