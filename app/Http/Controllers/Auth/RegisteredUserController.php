<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use App\Providers\RouteServiceProvider;
use App\Services\Message\MessageService;
use App\Services\Message\SMS\SMSService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('frontend.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string','max:11', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

         Session::put('name',$request->name);
         Session::put('mobile',$request->mobile);
         Session::put('password',$request->password);

         $checkSend = VerificationCode::checkTwoMinutes($request->mobile);
         if(!$checkSend){
             $code = rand('11111',99999);
             VerificationCode::createVerificationCode($request->mobile, $code);
             // send sms
             $smsService = new SMSService();
             $smsService->setReciever($request->mobile);
             $smsService->setContent($code);

             $messageService = new MessageService($smsService);

             $messageService->send();
         }else{
             return redirect()->back()->with('message', 'برای ارسال کد فعالسازی 2 دقیقه صبر کنید');
         }

        return redirect()->route('verify.mobile');
    }
}
