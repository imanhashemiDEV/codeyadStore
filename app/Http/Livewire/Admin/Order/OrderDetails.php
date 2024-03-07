<?php

namespace App\Http\Livewire\Admin\Order;

use App\Enums\OrderDetailStatus;
use App\Enums\OrderStatus;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderDetail;
use Livewire\Component;
use Livewire\WithPagination;

class OrderDetails extends Component
{
    public $order;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];


    public function chaneOrderDetailsStatus($id)
    {
        $order_details = OrderDetail::query()->find($id);
        if($order_details->status== OrderDetailStatus::Processing->value){
            $order_details->update([
                'status'=>OrderDetailStatus::Received->value
            ]);
        }elseif($order_details->status== OrderDetailStatus::Received->value){
            $order_details->update([
                'status'=>OrderDetailStatus::Rejected->value
            ]);
        }elseif($order_details->status== OrderDetailStatus::Rejected->value){
            $order_details->update([
                'status'=>OrderDetailStatus::Waiting->value
            ]);
        }
        elseif($order_details->status== OrderDetailStatus::Waiting->value){
            $order_details->update([
                'status'=>OrderDetailStatus::Processing->value
            ]);
        }

    }


    public function render()
    {
        $orders = OrderDetail::query()->
        where('order_id',$this->order)->
        whereHas('product',function ($q){
            return $q->where('title','like','%'.$this->search.'%');
        })->paginate(10);
        return view('livewire.admin.order.order-details', compact('orders'));
    }

}
