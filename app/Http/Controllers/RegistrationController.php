<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function showForm()
    {
        return view('registration');
    }

    public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|digits:11',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@(gmail|yahoo)\.com$/|unique:registrations,email',
        ]);

        if (!$validator) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages(),
            ], 422);
        }

        // Additional check for unique email
        $existingEmail = Registration::where('email', $request->email)->exists();
        if ($existingEmail) {
            return redirect()->back()->withErrors(['email' => 'This email is already registered.'])->withInput();
        }

        $registration = Registration::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
        ]);

        Mail::to($registration->email)->send(new \App\Mail\RegistrationMail($registration));

        return redirect()->back()->with('success', 'Registration successful! A confirmation email has been sent.');
    }

}
