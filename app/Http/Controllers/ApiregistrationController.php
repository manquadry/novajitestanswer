<?php

namespace App\Http\Controllers;

use App\Models\Apiregistrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiregistrationController extends Controller
{
    public function creatApiUser(Request $request)
    {

        // Validate the request
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|digits:11',
            'mobile_network' => 'required|string|in:mtn,airtel,9mobile,glo',
            'message' => 'required|string',
            'ref_code' => 'required|string|unique:Apiregistrations,ref_code',
        ]);

        // If validation fails, return failure response
        if ($validator->fails()) {
            return response()->json([
                'phone_number' => $request->phone_number,
                'mobile_network' => $request->mobile_network,
                'status' => 'failure',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        // Create a new registration record
        $registration = Apiregistrations::create($request->all());

        if ($registration) {
            // Return success response
            return response()->json([
                'phone_number' => $registration->phone_number,
                'mobile_network' => $registration->mobile_network,
                'status' => 'success',
                'message' => 'Registration successful',
            ], 200);
        } else {
            return response()->json([
                'phone_number' => $request->phone_number,
                'mobile_network' => $request->mobile_network,
                'status' => 'failure',
                'message' => $validator->errors()->first(),
            ], 403);
        }

    }
}
