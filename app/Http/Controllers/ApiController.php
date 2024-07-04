<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function createUser(Request $request)
    {

        return("hello world !!!!");
        // Validate request parameters
        $request->validate([
            'phone_number' => 'required',
            'mobile_network' => 'required',
            'Message' => 'required',
            'ref_code' => 'required|unique:registrations',
        ]);

        // Save to database or process as needed

        $response = [
            'phone_number' => $request->phone_number,
            'mobile_network' => $request->mobile_network,
            'status' => 'success',
            'message' => 'Registration successful',
        ];

        return response()->json($response);
    }
}
