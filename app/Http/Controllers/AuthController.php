<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            // Send a POST request to the external API
            $response = Http::post('http://localhost:8001/api/login', $credentials);

            // Debugging: Check the response status and body
            if ($response->failed()) {
                return redirect()->back()->withErrors(['error' => 'Authentication failed.'])->withInput($request->only('email'))->with('response', $response->body());
            }

            // Decode the JSON response
            $data = $response->json();

            if ($response->successful() && isset($data['token'])) {
                // If authentication is successful, store the token in the session
                Session::put('api_token', $data['token']);

                // Redirect to the desired page
                return redirect()->intended('/dashboard');
            }

            // If the response doesn't contain a token, return an error
            return redirect()->back()->withErrors(['error' => 'Authentication failed.'])->withInput($request->only('email'));
        } catch (\Exception $e) {
            // Handle any errors that occur during the HTTP request
            return redirect()->back()->withErrors(['error' => 'An error occurred while trying to authenticate: ' . $e->getMessage()])->withInput($request->only('email'));
        }
    }
}
