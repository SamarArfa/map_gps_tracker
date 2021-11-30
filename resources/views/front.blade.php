@extends('layouts.master')

@section('content')
<div class="container text-center">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h2>
        Laramap
    </h2>
    <div id="map">
    </div>
    <br>

    <form action="{{ route('location.store') }}" method="post" style="direction: rtl;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">


        <p>ما رأيك في الخدمات التي تقدمها وزارة الصحة:</p>
         <input type="radio" id="good" name="department_health" value="جيد">
         <label for="good">جيد</label>
         <input type="radio" id="bad" name="department_health" value="سئ">
         <label for="bad">سئ</label>
         <input type="radio" id="accept" name="department_health" value="مقبول">
         <label for="accept">مقبول</label>
        <br>

        <p>ما رأيك في الخدمات التي تقدمها وزارة التربية والتعليم:</p>
        <input type="radio" id="good" name="department_education" value="جيد">
        <label for="good">جيد</label>
        <input type="radio" id="bad" name="department_education" value="سئ">
        <label for="bad">سئ</label>
        <input type="radio" id="accept" name="department_education" value="مقبول">
        <label for="accept">مقبول</label>

        <br>
        <p>ما رأيك في الخدمات التي تقدمها وزارة العمل:</p>
        <input type="radio" id="good" name="department_Labor" value="جيد">
        <label for="good">جيد</label>
        <input type="radio" id="bad" name="department_Labor" value="سئ">
        <label for="bad">سئ</label>
        <input type="radio" id="accept" name="department_Labor" value="مقبول">
        <label for="accept">مقبول</label>

        <br>
        <label for="fname">الاسم:</label><br>
        <input type="text" id="fname" name="fname"><br><br>
        <label for="latitude">lat:</label><br>
        <input type="text" id="latitude" name="lat" ><br><br>
        <label for="lngtude">lang:</label><br>
        <input type="text" id="lngtude" name="lng" ><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>








</div>
@endsection

@section('js')


<script>

        var map;
        var myLatLng;
        $(document).ready(function() {
        geoLocationInit();
        });
        function geoLocationInit() {
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, fail);
        } else {
        alert("Browser not supported");
        }
        }

        function success(position) {
        console.log(position);
            var geocoder;
            geocoder = new google.maps.Geocoder();
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;
        myLatLng = new google.maps.LatLng(latval, lngval);
            document.getElementById("latitude").value=latval;
            document.getElementById("lngtude").value=lngval;

            geocoder.geocode(
                {'latLng': myLatLng},
                function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var add= results[0].formatted_address ;
                            var  value=add.split(",");

                            count=value.length;
                            country=value[count-1];
                            state=value[count-2];
                            city=value[count-3];
                            x.innerHTML = "city name is: " + city;
                            console.warn("city  "+city );

                        }
                        else  {
                            x.innerHTML = "address not found";
                        }
                    }
                    else {
                    }
                }
            );




            createMap(myLatLng);
        // nearbySearch(myLatLng, "school");
        // searchGirls(latval,lngval);
        }

        function fail() {
        alert("it fails");
        }
        //Create Map
        function createMap(myLatLng) {
        map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 12
        });
        var marker = new google.maps.Marker({
        position: myLatLng,
        map: map
        });
        }

</script>
@endsection
