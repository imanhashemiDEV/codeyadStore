<?php

namespace App\Http\Controllers\FrontEnd;

use App\Helpers\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('frontend.profile.profile',compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $user->update([
            'name'=>$request->input('name'),
            'user_name'=>$request->input('user_name'),
            'mobile'=> $user->mobile==null ? $request->input('mobile') : $user->mobile,
            'email'=>$user->email==null ? $request->input('email') : $user->email,
            'image'=>ImageManager::saveImage('users',$request->image),
        ]);

         if($user->userInfos){
             $user->userInfos()->update([
                 'bank_card_number'=>$request->input('bank_card_number'),
                 'national_identity_number'=>$request->input('national_identity_number'),
                 'newsletter'=>$request->input('newsletter')==='on',
             ]);
         }else{
             $user->userInfos()->create([
                 'bank_card_number'=>$request->input('bank_card_number'),
                 'national_identity_number'=>$request->input('national_identity_number'),
                 'newsletter'=>$request->input('newsletter')==='on',
             ]);
         }

        return redirect()->back()->with('message','اطلاعات شما بروزرسانی گردید');
    }

    public function profileOrders()
    {
        $user = auth()->user();
        $orders = Order::query()->where('user_id', $user->id)->paginate(10);
        return view('frontend.profile.profile_orders',compact('orders'));
    }

    public function profileOrderDetails($order_id)
    {
        $order = Order::query()->find($order_id);
        $order_details = OrderDetail::query()->where('order_id',$order_id)->paginate(1);
        return view('frontend.profile.profile_order_details',compact('order_details','order'));
    }


    public function profileComments()
    {
        $user = auth()->user();
        $comments = Comment::query()->where('user_id',$user->id)->get();
        return view('frontend.profile.profile_comments',compact('comments'));
    }

    public function profileFavorites()
    {
        return view('frontend.profile.profile_favorites');
    }

    public function profileAddresses()
    {
        return view('frontend.profile.profile_addresses');
    }
}
