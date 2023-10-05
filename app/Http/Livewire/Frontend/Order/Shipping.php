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
use Livewire\Component;

class Shipping extends Component
{

    public $receive_time;
    public $send_type;
    public $receive_day;
    public $send_day;
    public $send_price;
    public $request_factor=false;
    public $selected_address;

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
        if(Carbon::now()->addDays($this->send_day)->dayOfWeek != CarbonInterface::FRIDAY){
            $this->receive_day = Carbon::now()->addDays($this->send_day+1) ;
            $this->selected_day_index = 0;
        }
         $this->receive_day =  Carbon::now()->addDays($this->send_day);
        $this->send_type = "usual";
        $this->receive_time = "9-12";
    }

    public function submitOrderInfo()
    {
        $this->validate();
        return redirect()->route('user.shipping.payment');
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
        $this->selected_address = Address::query()->where('user_id',auth()->user()->id)
            ->where('is_default',true)->first();
        $this->send_price = $this->selected_address->city->send_price;
        $this->send_day = $this->selected_address->city->send_day;
        $carts = Cart::query()->where('type',CartType::Main->value)->get();
        $total_price=0;
        $discount_price=0;
        foreach ($carts as $cart ){
            $product = ProductGuaranty::query()->where([
                'product_id'=>$cart->product_id,
                'color_id'=>$cart->color_id,
                'guaranty_id'=>$cart->guaranty_id,
            ])->first();
            $total_price += ($product->price) * $cart->count;
            $discount_price += ($product->main_price - $product->price) * $cart->count;
        }

        return view('livewire.frontend.order.shipping',
            compact('carts','total_price',
                'discount_price','addresses',
            ));
    }
}
