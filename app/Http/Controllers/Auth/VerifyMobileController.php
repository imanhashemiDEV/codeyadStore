<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class VerifyMobileController extends Controller
{
    public function verify(): View
    {
        return view('frontend.auth.verify_mobile');
    }

    public function verifyCode(Request $request)
    {

        $code = (int)implode('',$request->code);
        $mobile = Session::get('mobile');
        $check = VerificationCode::checkVerificationCode($mobile, $code);
        if($check){
            $user = User::create([
                'name' => Session::get('name'),
                'mobile' => Session::get('mobile'),
                'password' => Hash::make(Session::get('password')),
            ]);
            event(new Registered($user));
            Auth::login($user);
            return redirect()->route('home');
        }else{
            return redirect()->back()->with('message','کد وارد شده صحیح نیست');
        }


    }
}
