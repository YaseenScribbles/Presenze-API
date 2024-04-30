<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GeocodingController extends Controller
{
    public function geocode(Request $request)
    {
        $lat = $request->query('lat');
        $lng = $request->query('lng');
        $apiKey = config('services.google_maps.api_key');

        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
            'query' => [
                'latlng' => "$lat,$lng",
                'key' => $apiKey,
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        return response()->json($data);
    }
}
