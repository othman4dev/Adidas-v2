<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\DemoMail;
use App\Models\User;

class MailController extends Controller
{
    public function sendMail(Request $request){
        $validatData = $request->validate([
            'email'=>'required',
        ]);
        $user = User::where('email',$validatData['email'])->count();
        if($user != 0){
            $token = Str::random(100);
            session(['token_reset'=>$token]);
            session(['email_reset'=>$validatData['email']]);
            $mailData = [
                'title' => 'MailFrom Adidas',
                'body' => 'test mail',
                'reset_password_url' => route('password/reset/', ['token' => $token]),
            ];
            Mail::to($validatData['email'])->queue(new DemoMail($mailData));
            return view('Auth.success');
        }
    }
}
