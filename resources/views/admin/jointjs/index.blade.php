@extends('admin.layout')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/jointjs/joint.css">
@stop

@section('content')
    <div id="myholder"></div>
@endsection

@section('scripts')
    <script src="/js/lodash/lodash.min.js"></script>
    <script src="/js/backbone/backbone-min.js"></script>
    <script src="/js/jointjs/joint.js"></script>

    <script type="text/javascript">

        var graph = new joint.dia.Graph;

        var paper = new joint.dia.Paper ({
            el: $('#myholder'),
            width: 600,
            height: 200,
            model: graph,
            gridSize: 1
        });

        joint.shapes.custom = {};

        joint.shapes.custom.ElementLink = joint.shapes.basic.Rect.extend({
            markup: '<g class="rotatable"><g class="scalable"><rect/></g><a><text/></a></g>',
            defaults: joint.util.deepSupplement({
                type: 'custom.ElementLink'
            },joint.shapes.basic.Rect.prototype.defaults)
        });

        var rect = new joint.shapes.custom.ElementLink({
            position: {x:100, y:30},
            size: {width:100, height:30},
            attrs: {rect:{fill:'blue'},
                a:{'xlink:href':'http://mobilityplus.empark.es','xlink:show':'new',cursor:'pointer'},
                text:{text:'eos Mobility',fill:'white'}}
        });

        var rect2 = new joint.shapes.custom.ElementLink({
            position: {x:300, y:30},
            size: {width:100, height:30},
            attrs: {rect:{fill:'green'},
                a:{'xlink:href':'http://apark.pt','xlink:show':'new',cursor:'pointer'},
                text:{text:'eos Market',fill:'white'}}
        });

        var link = new joint.dia.Link({
            source: {id:rect.id},
            target: {id:rect2.id}
        });

        graph.addCells([rect, rect2,link]);

    </script>
@stop

