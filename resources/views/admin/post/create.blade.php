@extends('admin.layout')

@section('styles')
    <link href="/css/pickadate/themes/default.css" rel="stylesheet">
    <link href="/css/pickadate/themes/default.date.css" rel="stylesheet">
    <link href="/css/pickadate/themes/default.time.css" rel="stylesheet">
    <link href="/css/selectize/selectize.css" rel="stylesheet">
    <link href="/css/selectize/selectize.bootstrap3.css" rel="stylesheet">
@stop

@section('content')
    <div class="container-fluid">
        <div clasS="row page-title-row">
            <div class="col-md-12">
                <h3>Posts <small>&raquo; Add New Post</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel-heading">
                    <h3 class="panel-title">New Post Form</h3>
                </div>
                <div class="panel-body">
                    @include('admin.partials.errors')

                    <form class="form-horizontal" role="form" method="POST" action="{{route('admin.post.store')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        @include('admin.post._form')

                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fa fa-disk-o"></i>
                                        Save New Post
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="/js/pickadate/picker.js"></script>
    <script src="/js/pickadate/picker.date.js"></script>
    <script src="/js/pickadate/picker.time.js"></script>
    <script src="/js/selectize/selectize.min.js"></script>
    <script>
        $(function() {
            $("#publish_date").pickadate({
                format : "mmm-d-yyyy"
            });
            $("#publish_time").pickatime({
               format : "h:i A"
            });
            $("#tags").selectize({
                create : true
            });
        });
    </script>
@stop