<?php

namespace App\Http\Livewire\Frontend\Order;

use App\Enums\CartType;
use App\Models\Address;
use App\Models\Cart;
use App\Models\City;
use App\Models\ProductGuaranty;
use App\Models\Province;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Shipping extends Component
{

    public $receive_time,$send_type,$receive_day,$send_day,
        $send_price,$selected_address,$carts,$total_price,$discount_price;
    public $request_factor=false;
    public $selected_day_index=0;

    protected $listeners = [
        'refreshCart' => '$refresh',
    ];

    protected $rules=[
        'receive_time'=>'required|sometimes',
        'send_type'=>'required',
    ];

    public function mount()
    {

        $this->selected_day_index = 0;
        $this->send_type = "usual";
        $this->receive_time = "9-12";

        $this->carts = Cart::query()->where('user_id',auth()->user()->id)-> where('type',CartType::Main->value)->get();
        $total_price=0;
        $discount_price=0;
        foreach ($this->carts as $cart ){
            $product = ProductGuaranty::query()->where([
                'product_id'=>$cart->product_id,
                'color_id'=>$cart->color_id,
                'guaranty_id'=>$cart->guaranty_id,
            ])->first();
            $this->total_price += ($product->price) * $cart->count;
            $this->discount_price += ($product->main_price - $product->price) * $cart->count;
        }
    }

    public function submitOrderInfo()
    {
        $this->validate();
        $shop_data=[];
        $shop_data['receive_time']=$this->receive_time;
        $shop_data['receive_day']=$this->receive_day;
        $shop_data['request_factor']=$this->request_factor;
        $shop_data['send_type']=$this->send_type;

        Session::put('shop_data',$shop_data);
        return redirect()->route('user.shipping.payment');
    }

    public function setDefaultAddress($address_id)
    {
        $prv_address = Address::query()
            ->where('user_id',auth()->user()->id)
            ->where('is_default',true)
            ->first();
        if($prv_address){
            $prv_address->update([
                'is_default'=>false
            ]);
        }
        $address = Address::query()->find($address_id);
        $address->update([
            'is_default'=>true
        ]);

        $this->emit('refreshCart');

    }

    public function receiveDay($i)
    {
        $this->selected_day_index = $i;
        $this->receive_day = Carbon::now()->addDays($i+$this->send_day);
    }

    public function render()
    {
        $addresses = Address::query()->where('user_id',auth()->user()->id)
            ->orderByDesc('is_default')->get();
        $address = Address::query()->where('user_id',auth()->user()->id)
            ->where('is_default',true)->first();
        if($address){
            $this->selected_address = $address;
            $this->send_price = $this->selected_address->city->send_price;
            $this->send_day = $this->selected_address->city->send_day;
            if(Carbon::now()->addDays($this->send_day)->dayOfWeek !== CarbonInterface::FRIDAY){
                $this->receive_day = Carbon::now()->addDays($this->send_day+1) ;
                $this->selected_day_index = 0;
            }
        }

        return view('livewire.frontend.order.shipping',
            compact('addresses'));
    }
}
