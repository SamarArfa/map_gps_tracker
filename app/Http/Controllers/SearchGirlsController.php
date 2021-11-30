<?php

namespace App\Http\Controllers;

use App\Girl;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Link;

class SearchGirlsController extends Controller
{
    public function addInfo(Request $request)
    {
//dd("dsgsgr");
//echo "dfewefw";
        $this->validate($request, [
            'fname' => 'required',
            'department_education' => 'required',
            'department_Labor' => 'required',
            'department_health' => 'required',
            'lat' => 'required',
            'lng'=>'required',
        ]);
        $location = new Location;
        $location->fname = $request->fname;
        $location->department_Labor = $request->department_Labor;
        $location->department_education = $request->department_education;
        $location->department_health = $request->department_health;
        $location->lat = $request->lat;
        $location->lng = $request->lng;
        $location->save();
        $locations = DB::table('locations')->get();
        return view('maps',compact('locations'))->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function gmaps()
    {
        $locations = DB::table('locations')->get();
        return view('maps',compact('locations'));
    }
}
//$.each( locations, function( index, value ){
//    marker = new google.maps.Marker({
//            position: new google.maps.LatLng(value.lat, value.lng),
//            map: map
//        });
//
//        google.maps.event.addListener(marker, 'click', (function(marker, i) {
//            return function() {
//                infowindow.setContent(value.fname);
//                infowindow.open(map, marker);
//            }
//        })(marker, i));
//    });
