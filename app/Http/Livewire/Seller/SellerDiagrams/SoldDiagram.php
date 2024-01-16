<?php

namespace App\Http\Livewire\Seller\SellerDiagrams;

use App\Models\UserTransaction;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Livewire\Component;

class SoldDiagram extends Component
{

    public $data = [];
    public $labels = [];

    public function mount()
    {
        for ($i=6;$i>=0;$i--){
            $date = Carbon::now()->subDay($i);
            array_push($this->labels, Verta::instance($date)->format('%B %d، %Y'));
            $total = UserTransaction::query()
                ->where('user_id',auth()->user()->id)
                ->whereDate('created_at',$date)->
                sum('amount');
            array_push($this->data, $total);
        }

    }

    public function render()
    {
        return view('livewire.seller.seller-diagrams.sold-diagram');
    }
}
