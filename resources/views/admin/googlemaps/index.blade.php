@extends('admin.layout')

@section('styles')
@stop

@section('content')
    <div id="gmap-fusion"></div>
@endsection

@section('scripts')
    <script src="http://maps.google.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&sensor=false&libraries=geometry&v=3.7"></script>
    <script src="/js/maplace-js/maplace-0.1.3.min.js"></script>

    <script type="text/javascript">
        new Maplace({
            map_div: '#gmap-fusion',
            type: 'fusion',
            map_options: {
                zoom: 2,
                set_center: [31.1, -39.4]
            },
            fusion_options: {
                query: {
                    from: '423292',
                    select: 'location'
                },
                heatmap: {
                    enabled: true
                },
                suppressInfoWindows: true
            }
        }).Load();
    </script>
@stop

