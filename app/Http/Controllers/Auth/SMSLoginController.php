<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client; // Assuming you're using Twilio for SMS

class SMSLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/checkout'; 

    public function showLoginForm()
    {
        return view('sms-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric'
        ]);
        $otp = mt_rand(1000, 9999); 
        $this->sendOTP($request->phone_number, $otp);
        session(['otp' => $otp]);
        session(['phone_number' => $request->phone_number]);
        return view('auth.verify-otp');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric'
        ]);
        $otp = session('otp');
        if ($request->otp == $otp) {
            Auth::loginUsingId(1); 
            return redirect($this->redirectTo);
        } else {
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP entered.']);
        }
    }

    protected function sendOTP($phoneNumber, $otp)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = env('TWILIO_PHONE_NUMBER');

        $client = new Client($sid, $token);

        $client->messages->create(
            $phoneNumber,
            [
                'from' => $twilioNumber,
                'body' => 'Your OTP for login is: ' . $otp
            ]
        );
    }
}
