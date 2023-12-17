<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('frontend.profile.profile');
    }

    public function profileOrders()
    {
        return view('frontend.profile.profile');
    }

    public function profileOrderDetails()
    {
        return view('frontend.profile.profile');
    }

    public function profileFavorites()
    {
        return view('frontend.profile.profile');
    }

    public function profileAddresses()
    {
        return view('frontend.profile.profile');
    }
}
