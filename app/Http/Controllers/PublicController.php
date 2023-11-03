<?php

namespace App\Http\Controllers;

use App\Models\HelpCenter;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublicController extends Controller
{
    public function index()
    {
        $rows = [];
        if(env('GHL_API_TOKEN')) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.env('GHL_API_TOKEN')
            ])->get('https://rest.gohighlevel.com/v1/locations/', [
                'limit' => 100,
                'query' => '',
            ]);

            $responseData = $response->json();
            $rows = $responseData['locations'];
        }
        return view("index", compact('rows'));
    }

    public function contacts(Request $request)
    {
        $data = $request->token;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$request->token
        ])->get('https://rest.gohighlevel.com/v1/contacts/', [
            'limit' => 100,
            'query' => '',
        ]);

        $responseData = $response->json();
        $rows = $responseData['contacts'];
        return view("contacts", compact("data", "rows"));
    }

    public function contactDetails(Request $request, $id)
    {
        $data = ['token' => $request->token, 'id' => $id];
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$request->token
        ])->get('https://rest.gohighlevel.com/v1/contacts/'.$id.'/appointments/');

        $responseData = $response->json();
        $rows = $responseData['events'];
        return view("contact-details", compact("data", "rows"));
    }

    public function authInitiate(Request $request)
    {
        $options = [
            'requestType' => 'code',
            'redirectUri' => route('auth.callback'),
            'clientId' => env('GHL_CLIENT_ID'),
            'scopes' => [
                'calendars.readonly',
                'campaigns.readonly',
                'contacts.readonly',
            ],
        ];

        $queryParams = http_build_query([
            'response_type' => $options['requestType'],
            'redirect_uri' => $options['redirectUri'],
            'client_id' => $options['clientId'],
            'scope' => implode(' ', $options['scopes']),
        ]);

        $authUrl = 'https://marketplace.gohighlevel.com/oauth/chooselocation?' . $queryParams;

        return redirect()->away($authUrl);
    }

    public function authRefresh(Request $request)
    {
        $data = [
            'client_id' => env('GHL_CLIENT_ID'),
            'client_secret' => env('GHL_CLIENT_SECRET'),
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->query('code'),
            'user_type' => 'Location',
            'redirect_uri' => route('auth.callback'),
        ];
    
        $response = Http::asForm()->post('https://services.leadconnectorhq.com/oauth/token', $data);
        return response()->json(['data' => $response->json()]);
    }

    public function callback(Request $request)
    {
        $data = [
            'client_id' => env('GHL_CLIENT_ID'),
            'client_secret' => env('GHL_CLIENT_SECRET'),
            'grant_type' => 'authorization_code',
            'code' => $request->query('code'),
            'user_type' => 'Location',
            'redirect_uri' => route('auth.callback'),
        ];

        $response = Http::asForm()->post('https://services.leadconnectorhq.com/oauth/token', $data);
        return response()->json(['data' => $response->json()]);
    }

}
