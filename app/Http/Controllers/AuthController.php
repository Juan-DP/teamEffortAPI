<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

public function generateSessionToken($uuid)
{
    $user = User::firstWhere('uuid', $uuid); // Retrieve the user from your backend database

    // Generate a session token using Laravel Passport's `createToken` method
    $accessToken = $user->createToken('MyApp')->accessToken;

    // Include any relevant user data in the response
    $responseData = [
        'access_token' => $accessToken,
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            // ...
        ],
    ];

    return response()->json($responseData);
}

public function getUserData($accessToken)
{
    $response = Http::withHeaders([
        'Authorization' => 'Bearer '.$accessToken,
    ])->get('https://api.third-party-provider.com/user');

    $userData = $response->json();

    // Extract relevant user data from the response
    $userId = $userData['id'];
    $email = $userData['email'];
    // ...

    // TODO - Redirect to FE
}

public function exchangeAccessToken(Request $request)
{
    $code = $request->input('code');
    $provider = $request->input('provider'); // Third-party provider name

    $response = Http::post('https://api.third-party-provider.com/oauth/token', [
        'grant_type' => 'authorization_code',
        'client_id' => config('services.'.$provider.'.client_id'),
        'client_secret' => config('services.'.$provider.'.client_secret'),
        'redirect_uri' => config('services.'.$provider.'.redirect_uri'),
        'code' => $code,
    ]);

    $accessToken = $response->json()['access_token'];

}
}
