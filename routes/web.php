<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});

Route::get('/test-seavantage', function () {
    $trackingNumber = 'TCNU3895116'; // Replace with your tracking number
    $apiUrl = 'https://api.seavantage.com/v1' . '/shipments/' . $trackingNumber; // Adjust endpoint as needed
    $apiKey = env('SEAVANTAGE_API_KEY');

    // Initialize cURL session
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $apiUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $apiKey,
            'Accept: application/json',
        ],
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    if ($error) {
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $error,
        ]);
    }

    $decodedResponse = json_decode($response, true);

    return response()->json([
        'success' => true,
        'data' => $decodedResponse,
    ]);
});
