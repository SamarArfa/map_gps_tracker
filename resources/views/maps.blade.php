<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Google Maps Multiple Markers</title>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </link>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
</head>
<body>
<div class="container text-center">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

<div id="map" style="width: 500px; height: 400px;"></div>
</div>
<script type="text/javascript">

    var locations = <?php print_r(json_encode($locations))?>;





    var mymap = new GMaps({
        el: '#map',
        lat: 31.5,
        lng: 34.46667,
        zoom:10
    });


    $.each( locations, function( index, value ){
        mymap.addMarker({
            lat: value.lat,
            lng: value.lng,
            title: value.fname,
            click: function(e) {
                alert( 'رأي '+value.fname+'في الخدمات التالية:'  +'\n ' +
                    'رأيك في الخدمات التي تقدمها وزارة الصحة '+'\n ' +value.department_health+'\n '
                    +'ما رأيك في الخدمات التي تقدمها وزارة التربية والتعليم:  ' +'\n '
                    + value.department_education+'\n '
                +'ما رأيك في الخدمات التي تقدمها وزارة العمل'+'\n '+value.department_Labor);
            }
        });
    });

</script>
</body>
</html>
