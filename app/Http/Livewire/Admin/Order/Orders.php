<?php

namespace App\Http\Livewire\Admin\Order;

use App\Enums\DiscountStatus;
use App\Enums\OrderStatus;
use App\Models\Discount;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];


    public function chaneOrderStatus($id)
    {
        $order = Order::query()->find($id);
        if($order->status== OrderStatus::Processing->value){
            $order->update([
                'status'=>OrderStatus::Payed->value
            ]);
        }elseif($order->status== OrderStatus::Payed->value){
            $order->update([
                'status'=>OrderStatus::Failed->value
            ]);
        }elseif($order->status== OrderStatus::Failed->value){
            $order->update([
                'status'=>OrderStatus::WaitForPayment->value
            ]);
        }
        elseif($order->status== OrderStatus::WaitForPayment->value){
            $order->update([
                'status'=>OrderStatus::SendOrder->value
            ]);
        }
        elseif($order->status== OrderStatus::SendOrder->value){
            $order->update([
                'status'=>OrderStatus::ReceivedOrder->value
            ]);
        }
        elseif($order->status== OrderStatus::ReceivedOrder->value){
            $order->update([
                'status'=>OrderStatus::NotReceivedOrder->value
            ]);
        }
        elseif($order->status== OrderStatus::NotReceivedOrder->value){
            $order->update([
                'status'=>OrderStatus::Processing->value
            ]);
        }
    }


    public function render()
    {
        $orders = Order::query()->
        where('order_code','like','%'.$this->search.'%')->
        orWhere('post_number','like','%'.$this->search.'%')->
        orWhereHas('user',function ($q){
            return $q->where('name','like','%'.$this->search.'%')
                ->OrWhere('mobile','like','%'.$this->search.'%')
                ->OrWhere('email','like','%'.$this->search.'%');
        })->
        paginate(10);
        return view('livewire.admin.order.orders', compact('orders'));
    }
}
