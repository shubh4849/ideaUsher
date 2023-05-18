<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\EmailJob;
use App\Jobs\SendEmailJob;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('sendEmail');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where("email", $request->email)->first();
        $password = $user->password;
        if (Hash::check($request->password, $user->password)) {
            if (
                Auth::attempt([
                    "email" => $request->email,
                    "password" => $request->password,
                ])
            ) {      
                $user = Auth::user();
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json(['token' => $token]);
                
            }
        }
        else {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
    }

    public function sendEmail(Request $request)
    {
        try {

            if(Auth::check()) {
                $emailData = $request->emailData;
                foreach ($emailData as $emailItem) {
                    $subject = $emailItem['subject'];
                    $body = $emailItem['body'];
                    $recipientEmail = $emailItem['userEmail'];
                    $emailStatus = EmailJob::insertGetId(['recipient_email' => $recipientEmail]);
                    Log::info('infoooo', [$subject, $body, $recipientEmail, $emailStatus]);
                    dispatch(new SendEmailJob($subject, $body, $recipientEmail, $emailStatus));
                }
                return response()->json(['message' => 'Emails sent successfully']);
            }
            return response()->json(['message' => 'Failed to send emails'], 500);
        } catch (\Exception $e) {
            Log::error('Error sending emails: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to send emails'], 500);
        }
    }
}