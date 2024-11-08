<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function register(request $request)
   {
      echo "hi";
   }
   public function findNearbyLocations(Request $request)
   {
      $latitude = $request->input('latitude');
      $longitude = $request->input('longitude');

      // Define a rough degree difference for proximity (~1 degree ≈ 111 km)
      $lat_diff = 0.1; // ~11 km of latitude difference
      $long_diff = 0.1; // ~11 km of longitude difference (at equator)

      // Calculate the latitude and longitude bounds (bounding box)
      $min_latitude = $latitude - $lat_diff;
      $max_latitude = $latitude + $lat_diff;
      $min_longitude = $longitude - $long_diff;
      $max_longitude = $longitude + $long_diff;

      // Query locations within the bounding box
      $locations = DB::table('locations')
         ->whereBetween('latitude', [$min_latitude, $max_latitude])
         ->whereBetween('longitude', [$min_longitude, $max_longitude])
         ->get();

      return response()->json([
         'status' => 'success',
         'data' => $locations,
         'message' => 'Nearby locations found successfully',
      ]);
   }
}
